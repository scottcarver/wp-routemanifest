<div class="page-content">

<?php
function uwcc_checkbox_field_1_render() {
    $types = get_post_types();
    $options = get_option( 'uwcc_settings', [] );

    $uwcc_checkbox_field_1 = isset( $options['uwcc_checkbox_field_1'] )
        ? (array) $options['uwcc_checkbox_field_1'] : [];
    ?>
    <input type='checkbox' name='uwcc_settings[uwcc_checkbox_field_1][]' <?php checked( in_array( 'Mastercard', $uwcc_checkbox_field_1 ), 1 ); ?> value='Mastercard'>
        <label>Mastercard</label>
    <input type='checkbox' name='uwcc_settings[uwcc_checkbox_field_1][]' <?php checked( in_array( 'Visa', $uwcc_checkbox_field_1 ), 1 ); ?> value='Visa'>
       <label>Visa</label>
    <input type='checkbox' name='uwcc_settings[uwcc_checkbox_field_1][]' <?php checked( in_array( 'Amex', $uwcc_checkbox_field_1 ), 1 ); ?> value='Amex'>
       <label>Amex</label>
    <?php
    echo('<pre>');
    var_dump($types);
    echo('</pre>');
}

?>
    <div class="tabs">
        <input name="tabs" type="radio" id="tab-1" checked="checked" class="input"/>
        <label for="tab-1" class="label">Orange</label>
        <div class="panel">
    <?php
    $args =  array(
        'label_for'         => 'wporg_field_pill',
        'class'             => 'wporg_row',
        'wporg_custom_data' => 'custom',
    );
        // Get the value of the setting we've registered with register_setting()
    $options = get_option( 'wporg_options' );
    // var_dump($options);
    uwcc_checkbox_field_1_render();
    ?>
    <select
            id="<?php echo esc_attr( $args['label_for'] ); ?>"
            data-custom="<?php echo esc_attr( $args['wporg_custom_data'] ); ?>"
            name="wporg_options[<?php echo esc_attr( $args['label_for'] ); ?>]">
        <option value="red" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'red', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'red pill', 'wporg' ); ?>
        </option>
        <option value="blue" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'blue', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'blue pill', 'wporg' ); ?>
        </option>
    </select>
    <p class="description">
        <?php esc_html_e( 'You take the blue pill and the story ends. You wake in your bed and you believe whatever you want to believe.', 'wporg' ); ?>
    </p>
    <p class="description">
        <?php esc_html_e( 'You take the red pill and you stay in Wonderland and I show you how deep the rabbit-hole goes.', 'wporg' ); ?>
    </p>
    
            <h1>Orange</h1>
            <p>The orange (specifically, the sweet orange) is the fruit of the citrus species Citrus × sinensis in the family Rutaceae</p>
            <p>The fruit of the Citrus × sinensis is considered a sweet orange, whereas the fruit of the Citrus × aurantium is considered a bitter orange. The sweet orange reproduces asexually (apomixis through nucellar embryony); varieties of sweet orange arise through mutations.</p>
        </div>

        <input name="tabs" type="radio" id="tab-2" class="input"/>
        <label for="tab-2" class="label">Tangerine</label>
        <div class="panel">
            <h1>Tangerine</h1>
            <p>Turn on Feeds?</p>
            <div class="switch">
                <input id="switch-1" type="checkbox" class="switch-input" />
                <label for="switch-1" class="switch-label">Switch</label>
            </div>
            <br /> <br />
            <p>Turn on Service Worker?</p>
            <div class="switch">
                <input id="switch-2" type="checkbox" class="switch-input" />
                <label for="switch-2" class="switch-label">Switch</label>
            </div>
            <p>The tangerine (Citrus tangerina) is an orange-colored citrus fruit that is closely related to, or possibly a type of, mandarin orange (Citrus reticulata).</p>
            <p>The name was first used for fruit coming from Tangier, Morocco, described as a mandarin variety. Under the Tanaka classification system, Citrus tangerina is considered a separate species.</p>
        </div>

        <input name="tabs" type="radio" id="tab-3" class="input"/>
        <label for="tab-3" class="label">Clemantine</label>
        <div class="panel">
            <h1>Clemantine</h1>
            <p>A clementine (Citrus ×clementina) is a hybrid between a mandarin orange and a sweet orange, so named in 1902. The exterior is a deep orange colour with a smooth, glossy appearance. Clementines can be separated into 7 to 14 segments. Similarly to tangerines, they tend to be easy to peel.</p>
        </div>
    </div>
</div>

<style type="text/css">

    /*
body {
	background-image: linear-gradient(19deg, #21D4FD 0%, #B721FF 100%);
ccc; 
	background-repeat: no-repeat;
	font: 400 16px/1.5em "Open Sans", sans-serif;
} */
.page-content {
	max-width: 800px; 
	/* margin: 32px auto; 
	padding: 32px; */ 
	/* background: #fff; */
}
.page-content *{ box-sizing: border-box;}

.tabs {
  display: flex;
  flex-wrap: wrap;
  max-width: 800px;
  background: #efefef;
  /* box-shadow: 0 48px 80px -32px rgba(0,0,0,0.3);
  box-shadow: 0 28px 20px -12px rgba(0,0,0,0.1); */
}

.tabs .input {
  position: absolute;
  opacity: 0;
}

.tabs .label {
  width: 100%;
  padding: 10px;
  background: #e5e5e5;
  cursor: pointer;
  font-weight: bold;
  font-size: 12px;
  color: #7f7f7f;
  transition: background 0.1s, color 0.1s;

  background: #e5e5e5;
  border: solid 1px #ccd0d4;
  border-width: 1px 1px 0 1px;
  z-index:1;
}

@media (min-width: 600px) {
    .tabs .label {
        padding:15px 20px;
        font-size:14px;
    }
}

.tabs .label:hover {
  background: #d8d8d8;
}

.tabs .label:active {
  background: #ccc;
}

.tabs .input:focus + .label {
  box-shadow: inset 0px 0px 0px 3px #2aa1c0;
  z-index: 1;
}

.tabs .input:checked + .label {
  background: #fff;
  color: #000;
}

@media (min-width: 600px) {}
  .tabs .label {
    width: auto;
  }


.tabs .panel {
  display: none;
  padding: 20px 30px 30px;
  background: #fff;
  border: solid 1px #ccd0d4;
  margin-top:-1px;
}


@media (min-width: 600px) {}
    .tabs .panel {
    order: 99;
  }


.tabs .input:checked + .label + .panel {
  display: block;
}



.switch {
  position: relative;
  display: inline-block;
}
.switch-input {
  display: none !important;
}
.switch-label {
  display: block;
  width: 48px;
  height: 24px;
  text-indent: -150%;
  clip: rect(0 0 0 0);
  color: transparent;
  user-select: none;
}
.switch-label::before,
.switch-label::after {
  content: "";
  display: block;
  position: absolute;
  cursor: pointer;
}
.switch-label::before {
  width: 100%;
  height: 100%;
  background-color: #dedede;
  border-radius: 9999em;
  -webkit-transition: background-color 0.25s ease;
  transition: background-color 0.25s ease;
}
.switch-label::after {
  top: 0;
  left: 0;
  width: 24px;
  height: 24px;
  border-radius: 50%;
  background-color: #fff;
  box-shadow: 0 0 2px rgba(0, 0, 0, 0.45);
  -webkit-transition: left 0.25s ease;
  transition: left 0.25s ease;
}
.switch-input:checked + .switch-label::before {
  background-color: #2271b1;
}
.switch-input:checked + .switch-label::after {
  left: 24px;
}


</style>