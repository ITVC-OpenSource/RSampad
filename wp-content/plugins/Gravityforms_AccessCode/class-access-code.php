<?php
/*
Plugin Name: فیلد کد دسترسی گرویتی فرم
Description: این پلاگین یک فیلد کد دسترسی را به فیلدهای پیشرفته گرویتی فرم اضافه میکند
Plugin URI: http://gravityforms.ir
Version: 1.0.2
Author: گرویتی فرم پارسی
Author URI: http://gravityforms.ir
Text Domain: gf_acc
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class GF_Access_Code_Field {

	public function __construct() {

		if ( is_admin() ) {

			add_filter( 'gform_add_field_buttons', array( $this, 'button' ), 999 );

			add_filter( 'gform_field_type_title', array( $this, 'title' ), 10, 2 );

			add_action( 'gform_editor_js_set_default_values', array( $this, 'default_label' ) );

			add_action( 'gform_editor_js', array( $this, 'editor_js' ) );

			add_filter( 'gform_tooltips', array( $this, 'tooltips' ) );

			add_filter( 'gform_admin_pre_render', array( $this, 'admin_conditional_logic' ) );
		}

		add_filter( 'gform_merge_tag_filter', array( $this, 'filter_all_fields' ), 10, 4 );

		add_action( 'gform_field_input', array( $this, 'field_input' ), 10, 5 );

		add_action( 'gform_field_standard_settings', array( $this, 'field_settings' ), 10, 2 );

		add_action( 'gform_field_css_class', array( $this, 'field_classes' ), 10, 3 );

		add_filter( 'gform_field_validation', array( $this, 'validator' ), 10, 4 );
	}

	public function button( $field_groups ) {

		$group_name = 'gf_persian_fields';
		if ( ! function_exists( 'wp_list_pluck' ) || ! in_array( $group_name, wp_list_pluck( $field_groups, 'name' ) ) ) {
			$group_name = 'advanced_fields';
		}

		foreach ( $field_groups as &$group ) {

			if ( $group["name"] == $group_name ) {

				$group["fields"][] = array(
					"class"     => "button",
					"value"     => __( 'کد دسترسی', 'gf_acc' ),
					'data-type' => 'access_code',
					//"onclick" => "StartAddField('access_code');"//deprecated
				);

				break;
			}
		}

		return $field_groups;
	}

	public function title( $title, $field_type ) {
		if ( $field_type == 'access_code' ) {
			return $title = __( 'کد دسترسی', 'gf_acc' );
		}

		return $title;
	}

	public function default_label() { ?>
        case "access_code" :
        field.label = '<?php _e( 'کد دسترسی', 'gf_acc' ); ?>';
        break;
		<?php
	}

	public function field_classes( $classes, $field, $form ) {

		if ( $field["type"] == "access_code" ) {
			$classes .= " gform_access_code";
		}

		return $classes;
	}

	public function tooltips( $tooltips ) {
		$tooltips["form_field_access_code_select"] = __( "<h6>نحوه وارد کردن کد های دسترسی</h6>توسط این گزینه میتوانید مشخص کنید که کد های دسترسی را از طریق فایل تکست فراخوانی کنید و یا دستی وارد کنید. در هر صورت باید کدها را از طریق کاما از هم جدا کنید.", 'gf_acc' );
		$tooltips["form_field_access_code_manual"] = __( "<h6>نحوه وارد کردن دستی</h6>کد های دسترسی را توسط کاما (,) از هم جدا کنید.", 'gf_acc' );
		$tooltips["form_field_access_code_link"]   = __( "میتوانید کد های دسترسی را به صورت جداسازی شده با کاما (,) داخل یک فایل با پسوند txt ذخیره کنید و سپس آدرس (Url) یا مسیر (Path) آن را در کادر زیر وارد نمایید.", 'gf_acc' );
		$tooltips["form_field_access_code_error"]  = __( "<h6>پیغام خطا</h6>پیغام خطا در صورتی که کد وارد شده اشتباه باشد را وارد نمایید.", 'gf_acc' );
		$tooltips["form_field_access_code_hidden"] = __( "با فعالسازی این گزینه، در صورتی که در اعلان ها و تاییدیه ها از برچسب همه فیلدهای پر شده یعنی {all_fields} استفاده شود، مقدار این فیلد ظاهر نمی شود.", 'gf_acc' );

		return $tooltips;
	}

	public function editor_js() { ?>
        <script type='text/javascript'>
            if (typeof fieldSettings != 'undefined')
                fieldSettings["access_code"] = ".placeholder_setting,.label_placement_setting, .prepopulate_field_setting,.error_message_setting, .conditional_logic_field_setting, .label_setting, .admin_label_setting, .size_setting, .rules_setting, .visibility_setting, .duplicate_setting, .default_value_setting, .description_setting, .css_class_setting, .access_code_setting";
            jQuery(document).bind("gform_load_field_settings", function (event, field, form) {
                /* select
				jQuery('#field_access_code_select').val(field.field_access_code_select == undefined ? "manual" : field.field_access_code_select);
				// show hide div when select option changed
				jQuery( '#field_access_code_select' ).change( function () {
					if ( jQuery( this ).val() == 'manual' ) {
						jQuery("#field_access_code_manual_div").show("slow");
						jQuery("#field_access_code_txt_div").hide("slow");
					}
					else {
						jQuery("#field_access_code_manual_div").hide("slow");
						jQuery("#field_access_code_txt_div").show("slow");
					}
				} ).change();
				*/
                // checkbox
                jQuery("#field_access_code_hidden").attr("checked", field["field_access_code_hidden"] == true);
                //text .. input ....
                jQuery("#field_access_code_manual").val(field["field_access_code_manual"]);
                jQuery("#field_access_code_txt").val(field["field_access_code_txt"]);
                jQuery("#field_access_code_msg").val(field["field_access_code_msg"]);
                //radio buttom
                if (field.field_access_code_radio == 'txt') {
                    jQuery("#field_access_code_radio_txt").prop("checked", true);
                    jQuery("#field_access_code_manual_div").hide("slow");
                    jQuery("#field_access_code_txt_div").show("slow");
                }
                else {
                    jQuery("#field_access_code_radio_manual").prop("checked", true);
                    jQuery("#field_access_code_txt_div").hide("slow");
                    jQuery("#field_access_code_manual_div").show("slow");
                }
                // show hide div when radio button changed
                jQuery('input[name="field_access_code_radio"]').on("click", function () {
                    if (jQuery('input[name="field_access_code_radio"]:checked').val() == 'manual') {
                        jQuery("#field_access_code_manual_div").show("slow");
                        jQuery("#field_access_code_txt_div").hide("slow");
                    }
                    else {
                        jQuery("#field_access_code_manual_div").hide("slow");
                        jQuery("#field_access_code_txt_div").show("slow");
                    }
                });
            });
        </script>
		<?php
	}

	public function admin_conditional_logic( $form ) {

		if ( GFCommon::is_entry_detail() ) {
			return $form;
		}

		echo "<script type='text/javascript'>" .
		     " gform.addFilter('gform_is_conditional_logic_field', function (isConditionalLogicField, field) {" .
		     "     return field.type == 'access_code' ? true : isConditionalLogicField;" .
		     '	});' .
		     "	gform.addFilter('gform_conditional_logic_operators', function (operators, objectType, fieldId) {" .
		     '		var targetField = GetFieldById(fieldId);' .
		     "		if (targetField && targetField['type'] == 'access_code') {" .
		     "			operators = {'is':'is','isnot':'isNot', '>':'greaterThan', '<':'lessThan', 'contains':'contains', 'starts_with':'startsWith', 'ends_with':'endsWith'};" .
		     '		}' .
		     '		return operators;' .
		     '	});' .
		     '</script>';

		return $form;
	}

	public function field_settings( $position, $form_id ) {
		if ( $position == 25 ) {
			?>
            <li class="access_code_setting field_setting">
                <hr/>
                <label for="field_access_code_select" class="inline section_label">
					<?php _e( "نحوه وارد کردن کدهای دسترسی", "gf_acc" ); ?>
					<?php gform_tooltip( "form_field_access_code_select" ); ?>
                </label><br>
                <!--This is a comment. Comments are not displayed in the browser
				<select id="field_access_code_select" onchange="SetFieldProperty('field_access_code_select', this.value);">
					<option value="manual"><?php //_e( 'دستی', 'gf_acc' );
				?></option>
					<option value="txt"><?php //_e( 'از طریف فایل txt', 'gf_acc' );
				?></option>
				</select>
				-->
                <label for="field_access_code_radio_manual" class="inline">
                    <input type="radio" name="field_access_code_radio" id="field_access_code_radio_manual"
                           value="manual" onclick="SetFieldProperty('field_access_code_radio', this.value);"/>
					<?php _e( 'دستی', 'gf_acc' ); ?>
                </label>

                <label for="field_access_code_radio_txt" class="inline">
                    <input type="radio" name="field_access_code_radio" id="field_access_code_radio_txt"
                           value="txt" onclick="SetFieldProperty('field_access_code_radio', this.value);"/>
					<?php _e( 'از طریق فایل تکست', 'gf_acc' ); ?>
                </label>

                <br>

                <div id="field_access_code_manual_div">
                    <label for="field_access_code_manual" class="inline">
						<?php _e( "کلید های دسترسی خود را با کاما (,) جدا کنید.", "gf_acc" ); ?>
						<?php gform_tooltip( "form_field_access_code_manual" ); ?>
                        <textarea id="field_access_code_manual"
                                  style="text-align:left !important; direction:ltr !important;"
                                  class="fieldwidth-1 fieldheight-1"
                                  onkeyup="SetFieldProperty('field_access_code_manual', this.value);"></textarea>
                    </label>
                </div>

                <div id="field_access_code_txt_div">
                    <label for="field_access_code_txt" class="inline">
						<?php _e( "آدرس یا مسیر فایل txt خود را وارد کنید.", "gf_acc" ); ?>
						<?php gform_tooltip( "form_field_access_code_link" ); ?>
                        <input type="text" style="text-align:left !important; direction:ltr !important;"
                               id="field_access_code_txt" class="fieldwidth-3"
                               onkeyup="SetFieldProperty('field_access_code_txt', this.value);"/>
                    </label>
                </div>

                <br>
                <label for="field_access_code_msg" class="inline section_label">
					<?php _e( "پیام اشتباه بودن کد دسترسی", "gf_acc" ); ?>
					<?php gform_tooltip( "form_field_access_code_error" ); ?>
                    <input type="text" id="field_access_code_msg" class="fieldwidth-3"
                           onkeyup="SetFieldProperty('field_access_code_msg', this.value);"/>
                </label>

                <br/><br/>
                <label for="field_access_code_hidden" class="inline">
                    <input type="checkbox" id="field_access_code_hidden"
                           onclick="SetFieldProperty('field_access_code_hidden', this.checked);"/>

					<?php _e( "مخفی کردن این فیلد از محتوای شورتکد {all_fields}", "gf_acc" ); ?>
					<?php gform_tooltip( "form_field_access_code_hidden" ); ?>
                </label>
                <hr>
            </li>
			<?php
		}
	}


	public function field_input( $input, $field, $value, $entry_id, $form_id ) {

		if ( $field["type"] == "access_code" ) {

			$field_id        = $field['id'];
			$form_id         = ! empty( $form_id ) ? $form_id : rgget( 'id' );
			$is_admin        = is_admin();
			$is_frontend     = ! $is_admin;
			$is_entry_detail = GFCommon::is_entry_detail();
			$is_form_editor  = GFCommon::is_form_editor();

			if ( $is_frontend && RGFormsModel::get_input_type( $field ) == 'adminonly_hidden' ) {
				return '';
			}

			$size         = rgar( $field, 'size' );
			$class_suffix = $is_entry_detail ? '_admin' : '';
			$class        = $size . $class_suffix;

			$input_id = $is_entry_detail || $is_form_editor || $form_id == 0 ? "input_$field_id" : 'input_' . $form_id . "_$field_id";

			$tabindex      = GFCommon::get_tabindex();
			$disabled_text = $is_form_editor ? "disabled='disabled'" : '';

			$max_length = '';
			//$max_length = "maxlength='{$max_length}'";
			/*
			$this->get_conditional_logic_event( 'keyup' )  //text or radio
			$this->get_conditional_logic_event( 'change' ) //select
			$this->get_conditional_logic_event( 'click' )  // checkbox or radio
			//note : radio has keyup and click
            */

			$logic_event = ! $is_form_editor && ! $is_entry_detail ? $field->get_conditional_logic_event( 'keyup' ) : '';

			$placeholder_attribute = $field->get_field_placeholder_attribute();
			$required_attribute    = $field->isRequired ? 'aria-required="true"' : '';
			$invalid_attribute     = $field->failed_validation ? 'aria-invalid="true"' : 'aria-invalid="false"';
			$html5_attributes      = " {$placeholder_attribute} {$required_attribute} {$invalid_attribute} {$max_length} ";

			$input = '<div class="ginput_container ginput_container_text ginput_container_access_code">';
			$input .= '<input name="input_' . $field_id . '" id="' . $input_id . '" type="text" value="' . esc_attr( $value ) . '" class="access_code ' . esc_attr( $class ) . '" ' . $tabindex . ' ' . $logic_event . ' ' . $html5_attributes . ' ' . $disabled_text . '/>';
			$input .= '</div>';
		}

		return $input;
	}

	public function validator( $result, $value, $form, $field ) {

		if ( $result["is_valid"] && $field["type"] == "access_code" ) {

			if ( rgar( $field, "field_access_code_radio" ) == 'txt' ) {
				$access_codes = @file_get_contents( rgar( $field, "field_access_code_txt" ) );
			} else {
				$access_codes = rgar( $field, "field_access_code_manual" );
			}

			$delimator    = ',';
			$access_codes = explode( $delimator, $access_codes );
			$access_codes = array_map( 'trim', array_filter( $access_codes ) );


			if ( empty( $access_codes ) || ! in_array( $value, $access_codes ) ) {
				$result["is_valid"] = false;
				$result["message"]  = rgar( $field, "field_access_code_msg", __( "کد وارد شده صحیح نمی باشد.", "gf_acc" ) );
			}
		}

		return $result;
	}

	public function filter_all_fields( $value, $merge_tag, $modifier, $field ) {
		if ( $merge_tag == 'all_fields' && $field->type == 'access_code' ) {
			if ( rgar( $field, "field_access_code_hidden" ) ) {
				return false;
			}
		}

		return $value;
	}

}

new GF_Access_Code_Field();