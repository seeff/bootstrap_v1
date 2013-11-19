<?php

$PageTitle="Checkout Page - Sockscribe Me - Awesome Socks Delivered to Your Door Monthly";
$page = "Checkout-Page";
function customPageHeader(){?>
  <!--Arbitrary HTML Tags-->
<?php }

include_once('header.php');
?>

<!-- begin page content -->

<div class="container">
      
    <div class="page-header">
        <h1>Checkout <small>You are 1 step away for happiness</small></h1>
    </div>

{% block checkout %}


{# BEGIN CHECKOUT TWIG TEMPLATE #}
<!-- ###########################################################################
BEGIN checkout
########################################################################### -->

<!--  *********** container ************* -->
<div id="container" class="col-md-8 col-md-offset-2">{{ html_messages|raw }}
<form id="fc_form_checkout" method="post" action="https://{{ store_domain }}{{ post_url }}" onsubmit="return false;">



    {% block checkout_error %}
    <div id="fc_form_checkout_error" class="alert alert-warning" style="display:none">{{ lang.checkout_required_info_missing|raw }}</div>
    {% endblock checkout_error %}



    {% block required_hidden_fields %}
    <div id="fc_required_hidden_fields">
        <input type="hidden" id="ThisAction" name="ThisAction" value="checkout" />
        <input type="hidden" id="customer_id" name="customer_id" value="{{ customer_id_encoded }}" />
        <input type="hidden" name="{{ session_name }}" value="{{ session_id }}" />
        {{ csrf_hidden_input|raw }}
        {% if auth_token_is_valid %}
            <input type="hidden" name="fc_auth_token" value="{{ fc_auth_token }}" />
            <input type="hidden" name="timestamp" value="{{ timestamp }}" />
            <input type="hidden" name="fc_customer_id" value="{{ fc_customer_id }}" />
        {% endif %}
        {# preserve paypal express variables #}
        {% if token != '' and payer_id != '' %}
            <input type="hidden" id="token" name="token" value="{{ token }}" />
            <input type="hidden" id="PayerID" name="PayerID" value="{{ payer_id }}" />
        {% endif %}
        {% for var_name, var_value in hosted_gateway_vars %}
            <input type="hidden" name="{{ var_name }}" value="{{ var_value }}" />
        {% endfor %}
    </div>
    {% endblock required_hidden_fields %}



<!--     {% block continue_shopping %}
    <div id="fc_cancel_continue_shopping">
    {% if page_referer != '' and not is_updateinfo %}
        <a href="{{ page_referer }}">{{ lang.checkout_cancel_and_continue|raw }}</a>
    {% endif %}
    </div>
    {% endblock continue_shopping %} -->



    {% block noscript_warning %}
    <noscript>
        <div id="alert alert-warning_noscript" class="alert alert-warning">
            <h3>{{ lang.checkout_warning|raw }}</h3>
            <p>{{ lang.checkout_missing_message|raw }}</p>
        </div><!-- #alert alert-warningNoScript -->
    </noscript>
    {% endblock noscript_warning %}



    {% block login_register %}
    <!--  *********** login_register : Login or Register ************* -->
    <div class="form-group" id="fc_login_register_container">
<!--     <h2>{% if checkout_type == 'guest_only' %}{{ lang.checkout_as_guest|raw }}{% else %}{{ lang.checkout_login_or_register|raw }}{% endif %}</h2>
 -->    <fieldset id="fc_login_register">
        <!-- <legend>{% if checkout_type == 'guest_only' %}{{ lang.checkout_as_guest|raw }}{% else %}{{ lang.checkout_login_or_register|raw }}{% endif %}</legend> -->
        <div class="shaded-form col-md-8 col-md-offset-2">
            <div id="fc_login_register_list">
        {% if not customer_is_authenticated %}
                <div id="li_customer_email" class="form-group fc_customer_email">
<!--                     <label class="control-label" for="customer_email">{{ lang.checkout_email|raw }}<span class="fc_ast">*</span></label> -->                    <input type="text" value="{{ email }}" autocomplete="off" class="form-control  fc_required" id="customer_email" name="customer_email" placeholder="{{ lang.checkout_email|raw }}">
                    <label style="display:none;" class="help-block" for="customer_email">{{ lang.checkout_error_email|raw }}</label>
                    <p class="help-block" id="fc_account_message_status">
                        {{ lang.checkout_instructions_email|raw }}
                    </p>
                    <span style="display:none" id="login_ajax"><img alt="{{ lang.checkout_loading|raw }}" src="//cdn.foxycart.com/static{{ base_directory }}/images/ajax-loader.gif?ver=1"></span>
                    <p style="display:none;" class="help-block" id="fc_account_message_explanation"></p>
                </div>
            {% if not is_updateinfo and checkout_type != 'guest_only' and checkout_type != 'account_only' %}
                <div class="form-control_radio fc_guest_checkout">
                    <label for="is_anonymous_1" class="form-control">
                        <input type="radio" name="is_anonymous" value="1" id="is_anonymous_1" class="form-control"{% if default_to_guest %} checked="checked"{% endif %} autocomplete="off"/>
                        <span>{{ lang.checkout_as_guest|raw }}</span>
                    </label>
                </div>
                <div class="form-control_radio fc_guest_checkout">
                    <label for="is_anonymous_0" class="form-control">
                        <input type="radio" name="is_anonymous" value="0" id="is_anonymous_0" class="form-control"{% if not default_to_guest %} checked="checked"{% endif %} autocomplete="off" />
                        <span>{{ lang.checkout_as_customer|raw }}</span>
                    </label>
                </div>
            {% else %}
                {% if checkout_type == 'guest_only' %}
                    <input type="hidden" name="is_anonymous" id="is_anonymous" value="1" />
                {% else %}
                    <input type="hidden" name="is_anonymous" id="is_anonymous" value="0" />
                {% endif %}
            {% endif %}
        {% else %}
                <div class="fc_customer_email form-group" id="li_customer_email">
                    <span class="control-label">{{ lang.checkout_email|raw }}<span class="fc_ast">*</span></span>
                    <!-- <span id="customer_email_authenticated" class="form-control">{{ email }}</span> -->
                    <input type="hidden" name="customer_email" id="customer_email" value="{{ email }}" placeholder="{{ lang.checkout_email|raw }}" />
                    <label for="customer_email" class="alert alert-warning" style="display:none;">{{ lang.checkout_error_email|raw }}</label>
                    <p id="fc_account_message_sso" class="help-block">{{ lang.checkout_sso_already_logged_in|raw }}</p
                </div>
        {% endif %}
                <div id="li_customer_password" style="display:none;" class="form-group fc_customer_password">
                    <p style="display:none;" class="help-block" id="fc_account_message_password"></p>
                    <!-- <label class="control-label" for="customer_password">{{ lang.checkout_password|raw }}</label> -->
                    <input type="password" value="{{ customer_password }}" autocomplete="off" class="form-control " id="customer_password" name="customer_password" placeholder="{{ lang.checkout_password|raw }}">
                    <label style="display:none;" class="help-block" for="customer_password">{{ lang.checkout_error_password|raw }}</label>
                </div>
                <div id="li_customer_password2" style="display:none;" class="form-group fc_customer_password2">
                    <!-- <label class="control-label" for="customer_password2">{{ lang.checkout_retype_password|raw }}</label> -->
                    <input type="password" value="{{ customer_password }}" autocomplete="off" class="form-control " onchange="FC.checkout.checkPasswords()" id="customer_password2" name="customer_password2" placeholder="{{ lang.checkout_retype_password|raw }}">
                    <label style="display:none;" class="help-block" for="customer_password2">{{ lang.checkout_error_retype_password|raw }}</label>
                </div>
                <div id="li_customer_email_password" class="form-group" style="display:none">
                    <label for="fc_email_password" class="alert alert-warning"><a id="fc_email_password" href="javascript:;" onclick="FC.checkout.emailPassword()">{{ lang.checkout_email_my_password|raw }}</a></label>
                </div>
                <div id="li_customer_new_password" class="form-group" style="display:none">
                    <label for="fc_new_password"><a id="fc_new_password" href="javascript:;" onclick="FC.checkout.newPassword()">{{ lang.checkout_change_my_password|raw }}</a></label>
                </div>
            </div>
            <input type="hidden" name="email_found" id="email_found" value="{{ email_found }}" />
            <a class="btn btn-block btn-default" id="fc_continue" href="#" onclick="FC.checkout.checkLogin();">{{ lang.checkout_continue|raw }}</a>
            <span class="clearfix">&nbsp;</span>
        </div><!-- .fc_inner -->
    </fieldset><!-- #fc_login_register -->
    <span class="clearfix">&nbsp;</span>
    </div><!-- #fc_login_register_container -->
    {% endblock login_register %}




    {% if not is_subscription_cancel %}
    <div id="fc_data_entry_container">
        <div id="fc_customer_info_container">




            <!--  *********** customer_billing : Billing Address ************* -->
            {% block customer_billing %}
            <div class="fc_fieldset_container hide" id="fc_customer_billing_container">
<!--                 <h2>{{ lang.checkout_billing_address|raw }}</h2>
 -->                <fieldset id="fc_customer_billing">
                    <legend>{{ lang.checkout_billing_address|raw }}</legend>
                    <div class="fc_inner">
                        <div id="fc_customer_billing_list">
                            <div class="fc_row fc_row_select fc_foxycomplete fc_customer_country_name">
                                <label class="fc_pre" for="customer_country_name">{{ lang.checkout_country|raw }}<span class="fc_ast">*</span></label>
                                <select class="form-control  fc_required fc_location" id="customer_country" name="customer_country">
                                {{ country_options|raw }}
                                </select>
                                <input type="text" style="display:none;" class="fc_foxycomplete_input form-control  fc_required fc_location" id="customer_country_name" name="customer_country_name">
                                <label style="display:none;" class="fc_error" for="customer_country_name">{{ lang.checkout_error_country|raw }}</label>
                            </div>
                            <!-- <div class="fc_row fc_customer_first_name">
                                <label class="fc_pre" for="customer_first_name">{{ lang.checkout_first_name|raw }}<span class="fc_ast">*</span></label>
                                <input type="text" class="form-control  fc_required" id="customer_first_name" value="customer_first_name" name="customer_first_name" autocomplete="billing given-name">
                                <label style="display:none;" class="fc_error" for="customer_first_name" value="customer_first_name">{{ lang.checkout_error_first_name|raw }}</label>
                            </div> -->
                            <div class="fc_row fc_customer_last_name">
                                <label class="fc_pre" for="customer_last_name">{{ lang.checkout_last_name|raw }}<span class="fc_ast">*</span></label>
                                <input type="text" class="form-control  fc_required" id="customer_last_name" name="customer_last_name" autocomplete="billing family-name" value="customer_last_name">
                                <label style="display:none;" class="fc_error" for="customer_last_name">{{ lang.checkout_error_last_name|raw }}</label>
                            </div>
                            <div class="fc_row fc_customer_company">
                                <label class="fc_pre" for="customer_company">{{ lang.checkout_company|raw }}</label>
                                <input type="text"  class="form-control " id="customer_company" name="customer_company" value="customer_company" autocomplete="billing organization">
                                <label style="display:none;" class="fc_error" for="customer_company">{{ lang.checkout_error_company|raw }}</label>
                            </div>
                            <div class="fc_row fc_customer_address1">
                                <label class="fc_pre" for="customer_address1">{{ lang.checkout_address1|raw }}<span class="fc_ast">*</span></label>
                                <input type="text"  class="form-control  fc_required" id="customer_address1" value="customer_address1" name="customer_address1" autocomplete="billing address-line1">
                                <label style="display:none;" class="fc_error" for="customer_address1">{{ lang.checkout_error_address1|raw }}</label>
                            </div>
                            <div class="fc_row fc_customer_address2">
                                <label class="fc_pre" for="customer_address2">{{ lang.checkout_address2|raw }}</label>
                                <input type="text" value="customer_address1" class="form-control " id="customer_address2" name="customer_address2" autocomplete="billing address-line2">
                            </div>
                            <div class="fc_row fc_customer_city">
                                <label class="fc_pre" for="customer_city">{{ lang.checkout_city|raw }}<span class="fc_ast">*</span></label>
                                <input type="text" class="form-control  fc_required" id="customer_city" name="customer_city" value="customer_city" autocomplete="billing locality">
                                <label style="display:none;" class="fc_error" for="customer_city">{{ lang.checkout_error_city|raw }}</label>
                            </div>
                            <div class="fc_row fc_row_select fc_foxycomplete fc_customer_state_name">
                                <label class="fc_pre" for="customer_state_name">{{ lang.checkout_state|raw }}<span class="fc_ast">*</span></label>
                                <select class="form-control  fc_required fc_location"  id="customer_state" name="customer_state">
                                {{ region_options|raw }}
                                </select>
                                <input  type="text" style="display:none;" class="fc_foxycomplete_input form-control  fc_required fc_location" value="California" id="customer_state_name" name="customer_state_name">
                                <label style="display:none;" class="fc_error" for="customer_state_name">{{ lang.checkout_error_state|raw }}</label>
<!--                             </div>
                                <div class="fc_row fc_customer_postal_code">
                                <label class="fc_pre" for="customer_postal_code">{{ lang.checkout_postal_code|raw }}<span class="fc_ast">*</span></label>
                                <input type="text"  class="form-control form-control_short fc_required" id="customer_postal_code" name="customer_postal_code" autocomplete="billing postal-code" value="customer_postal_code">
                                <label style="display:none;" class="fc_error" for="customer_postal_code">{{ lang.checkout_error_postal_code|raw }}</label>
                                <label style="display:none;" class="fc_error fc_error_invalid_postal_code" for="customer_postal_code">{{ lang.checkout_error_invalid_postal_code|raw }}</label>
                            </div> -->
                            <div class="fc_row fc_customer_phone">
                                <label class="fc_pre" for="customer_phone">{{ lang.checkout_phone|raw }}</label>
                                <input type="text" class="form-control " id="customer_phone" name="customer_phone" value="fc_customer_phone" autocomplete="billing tel">
                                <label style="display:none;" class="fc_error" for="customer_phone">{{ lang.checkout_error_phone|raw }}</label>
                            </div>
                        </div>
                    {% if has_shippable_products and not has_multiship %}
                        <div class="fc_row fc_row_checkbox" id="fc_use_different_address">
                            <label class="form-control" for="use_different_addresses">
                            <input{% if use_alternate_shipping_address %} checked="checked"{% endif %} type="checkbox" onclick="FC.checkout.displayShippingAddress(this)" class="checkbox" value="1" id="use_different_addresses" name="use_different_addresses" checked>
                            <span>{{ lang.checkout_use_shipping_address|raw }}</span>
                        </label>
                        </div>
                          <div class="fc_row" id="fc_copy_billing_address">
                    {% endif %}
                        <span class="fc_clear">&nbsp;</span>
                    </div><!-- .fc_inner -->
                </fieldset><!-- #fc_customer_billing -->
                <span class="fc_clear">&nbsp;</span>
            </div>
        {% endblock customer_billing %}



        {% if not has_multiship %}



            {% block customer_shipping %}
            <!--  *********** address_shipping : Shipping Address ************* -->
            <div style="display: none;" class="form-group" id="fc_address_shipping_container">
<!--                  <h2>{{ lang.checkout_shipping_address|raw }}</h2>
 -->                <fieldset id="fc_shipping_address">
                    <legend>{{ lang.checkout_shipping_address|raw }}</legend>
                    <div class="fc_inner">
                        <div id="fc_address_shipping_list">
                            <div class="form-control_select fc_foxycomplete fc_shipping_country_name hide">
                                <!-- <label class="control-label" for="shipping_country_name">{{ lang.checkout_country|raw }}<span class="fc_ast">*</span></label> -->
                                <select class="form-control  fc_required fc_location" data-default-value="{{ country_code }}" id="shipping_country" name="shipping_country">
                                {{ shipping_country_options|raw }}
                                </select>
                                <input value="{{ (shipping_country_code == '') ? shipping_country_name : shipping_country_code }}" type="text" style="display:none;" class="fc_foxycomplete_input form-control  fc_required fc_location" id="shipping_country_name" name="shipping_country_name">
                                <label style="display:none;" class="help-block" for="shipping_country_name">{{ lang.checkout_error_country|raw }}</label>
                            </div>
                            <div class="form-group">
                                <div class="fc_shipping_first_name form-group col-sm-6">
                                    <!-- <label class="control-label" for="shipping_first_name">{{ lang.checkout_first_name|raw }}<span class="fc_ast">*</span></label> -->
                                    <input type="text" value="{{ shipping_first_name }}" class="form-control  fc_required" id="shipping_first_name" name="shipping_first_name" autocomplete="shipping given-name" placeholder="{{ lang.checkout_first_name|raw }}">
                                    <label style="display:none;" class="help-block" for="shipping_first_name">{{ lang.checkout_error_first_name|raw }}</label>
                                </div>
                                <div class="fc_shipping_last_name form-group col-sm-6">
                                    <!-- <label class="control-label" for="shipping_last_name">{{ lang.checkout_last_name|raw }}<span class="fc_ast">*</span></label> -->
                                    <input type="text" value="{{ shipping_last_name }}" class="form-control  fc_required" id="shipping_last_name" name="shipping_last_name" autocomplete="shipping family-name" placeholder="{{ lang.checkout_last_name|raw }}">
                                    <label style="display:none;" class="help-block" for="shipping_last_name">{{ lang.checkout_error_last_name|raw }}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="fc_shipping_address1 form-group col-sm-9">
                                    <!-- <label class="control-label" for="shipping_address1">{{ lang.checkout_address1|raw }}<span class="fc_ast">*</span></label> -->
                                    <input type="text" value="{{ shipping_address1 }}" class="form-control  fc_required" id="shipping_address1" name="shipping_address1" autocomplete="shipping address-line1" placeholder="{{ lang.checkout_address1|raw }}">
                                    <label style="display:none;" class="help-block" for="shipping_address1">{{ lang.checkout_error_address1|raw }}</label>
                                </div>
                                <div class="fc_shipping_address2 form-group col-sm-3">
                                    <!-- <label class="control-label" for="shipping_address2">{{ lang.checkout_address2|raw }}</label> -->
                                    <input type="text" value="{{ shipping_address2 }}" class="form-control " id="shipping_address2" name="shipping_address2" autocomplete="shipping address-line2" placeholder="{{ lang.checkout_address2|raw }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="fc_shipping_city form-group col-sm-6">
                                    <!-- <label class="control-label" for="shipping_city">{{ lang.checkout_city|raw }}<span class="fc_ast">*</span></label> -->
                                    <input type="text" value="{{ shipping_city }}" class="form-control  fc_required" id="shipping_city" name="shipping_city" autocomplete="shipping locality" placeholder="{{ lang.checkout_city|raw }}">
                                    <label style="display:none;" class="help-block" for="shipping_city">{{ lang.checkout_error_city|raw }}</label>
                                </div>
                                <div class="form-group col-sm-3">
                                    <input type="text" value="{{ shipping_region_code }}" class="form-control  fc_required" id="shipping_state_name" name="shipping_state_name" autocomplete="shipping region" placeholder="{{ lang.checkout_state|raw }}">
                                    <label style="display:none;" class="help-block" for="shipping_state_name">{{ lang.checkout_error_state|raw }}</label>
                                </div>
                                    <div class="fc_shipping_postal_code form-group col-sm-3">
                                    <!-- <label class="control-label" for="shipping_postal_code">{{ lang.checkout_postal_code|raw }}<span class="fc_ast">*</span></label> -->
                                    <input type="text" value="{{ shipping_postal_code }}" class="form-control form-control_short fc_required" id="shipping_postal_code" name="shipping_postal_code" autocomplete="shipping postal-code" placeholder="{{ lang.checkout_postal_code|raw }}">
                                    <label style="display:none;" class="help-block" for="shipping_postal_code">{{ lang.checkout_error_postal_code|raw }}</label>
                                    <label style="display:none;" class="help-block" for="shipping_postal_code">{{ lang.checkout_error_invalid_postal_code|raw }}</label>
                                </div>
                            </div>
                        </div>
                        <!-- <div id="fc_copy_billing_address">
                            <p><a href='#' onclick='FC.checkout.copyBillingToShipping(); return false;'>{{ lang.checkout_copy_billing_address_to_shipping|raw }}</a></p>
                        </div> -->
                        <span class="clearfix">&nbsp;</span>
                    </div><!-- .fc_inner -->
                </fieldset><!-- #fc_address_shipping -->
                <span class="clearfix">&nbsp;</span>
            </div>
            {% endblock customer_shipping %}



        {% else %}{# If the store has multiship enabled #}



            {% block multiship_shipping %}
            <!--  *********** fc_shipto_# : Ship To: ************* -->
            <div id="fc_address_multiship_container">
            {% for multiship in multiship_data %}
                <div class="form-group" id="fc_shipto_{{ multiship.number }}_container">
<!--                     <h2>{{ lang.checkout_shipto|raw }} <span class="fc_shipto_name">{{ multiship.address_name }}</span></h2>
 -->                    <fieldset id="fc_shipto_{{ multiship.number }}">
                        <legend>{{ lang.checkout_shipto|raw }} <span class="fc_shipto_name">{{ multiship.address_name }}</span></legend>
                        <div style="display:none;" class="fc_inner fc_shipto_display" id="fc_shipto_{{ multiship.number }}_display"></div>
                        <div class="fc_inner fc_shipto_entry" id="fc_shipto_{{ multiship.number }}_entry">
                            <div id="fc_shipto_{{ multiship.number }}_list">
                                <div id="li_shipto_{{ multiship.number }}_select" class="li_shipping_select">
                                    <label for="shipto_{{ multiship.number }}_select" class="control-label">{{ lang.checkout_multiship_use_address|raw }}</label>
                                    <select id="shipto_{{ multiship.number }}_select" name="shipto_{{ multiship.number }}_select" onchange="FC.checkout.selectAddress({{ multiship.number }},this)">
                                    <option value="" selected="selected">{{ lang.checkout_multiship_new_address|raw }}</option>
                                    <option value="-1">{{ lang.checkout_multiship_use_billing_address|raw }}</option>
                                    </select>
                                </div>
                                <div class="form-control_select fc_foxycomplete fc_shipto_{{ multiship.number }}_country_name">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_country_name">{{ lang.checkout_country|raw }}<span class="fc_ast">*</span></label>
                                    <select class="form-control  fc_required fc_location" data-default-value="" id="shipto_{{ multiship.number }}_country" name="shipto_{{ multiship.number }}_country">
                                    {{ multiship.country_options|raw }}
                                    </select>
                                    <input value="{{ (multiship.country_code == '') ? multiship.country_name : multiship.country_code }}" type="text" style="display:none;" class="fc_foxycomplete_input form-control  fc_required fc_location" id="shipto_{{ multiship.number }}_country_name" name="shipto_{{ multiship.number }}_country_name">
                                    <label style="display:none;" class="help-block" for="shipto_{{ multiship.number }}_country_name">{{ lang.checkout_error_country|raw }}</label>
                                </div>
                                <div class="fc_shipto_{{ multiship.number }}_first_name">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_first_name">{{ lang.checkout_first_name|raw }}<span class="fc_ast">*</span></label>
                                    <input type="text" value="{{ multiship.first_name }}" class="form-control  fc_required" id="shipto_{{ multiship.number }}_first_name" name="shipto_{{ multiship.number }}_first_name" autocomplete="section-{{ multiship.number }} shipping given-name">
                                    <label style="display:none;" class="help-block" for="shipto_{{ multiship.number }}_first_name">{{ lang.checkout_error_first_name|raw }}</label>
                                </div>
                                <div class="fc_shipto_{{ multiship.number }}_last_name">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_last_name">{{ lang.checkout_last_name|raw }}<span class="fc_ast">*</span></label>
                                    <input type="text" value="{{ multiship.last_name }}" class="form-control  fc_required" id="shipto_{{ multiship.number }}_last_name" name="shipto_{{ multiship.number }}_last_name" autocomplete="section-{{ multiship.number }} shipping family-name">
                                    <label style="display:none;" class="help-block" for="shipto_{{ multiship.number }}_last_name">{{ lang.checkout_error_last_name|raw }}</label>
                                </div>
                                <div class="fc_shipto_{{ multiship.number }}_company">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_company">{{ lang.checkout_company|raw }}</label>
                                    <input type="text" value="{{ multiship.company }}" class="form-control " id="shipto_{{ multiship.number }}_company" name="shipto_{{ multiship.number }}_company" autocomplete="section-{{ multiship.number }} shipping organization">
                                    <label style="display:none;" class="help-block" for="shipto_{{ multiship.number }}_company">{{ lang.checkout_error_company|raw }}</label>
                                </div>
                                <div class="fc_shipto_{{ multiship.number }}_address1">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_address1">{{ lang.checkout_address1|raw }}<span class="fc_ast">*</span></label>
                                    <input type="text" value="{{ multiship.address1 }}" class="form-control  fc_required" id="shipto_{{ multiship.number }}_address1" name="shipto_{{ multiship.number }}_address1" autocomplete="section-{{ multiship.number }} shipping address-line1">
                                    <label style="display:none;" class="help-block" for="shipto_{{ multiship.number }}_address1">{{ lang.checkout_error_address1|raw }}</label>
                                </div>
                                <div class="fc_shipto_{{ multiship.number }}_address2">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_address2">{{ lang.checkout_address2|raw }}</label>
                                    <input type="text" value="{{ multiship.address2 }}" class="form-control " id="shipto_{{ multiship.number }}_address2" name="shipto_{{ multiship.number }}_address2" autocomplete="section-{{ multiship.number }} shipping address-line2">
                                </div>
                                <div class="fc_shipto_{{ multiship.number }}_city">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_city">{{ lang.checkout_city|raw }}<span class="fc_ast">*</span></label>
                                    <input type="text" value="{{ multiship.city }}" class="form-control  fc_required" id="shipto_{{ multiship.number }}_city" name="shipto_{{ multiship.number }}_city" autocomplete="section-{{ multiship.number }} shipping locality">
                                    <label style="display:none;" class="help-block" for="shipto_{{ multiship.number }}_city">{{ lang.checkout_error_city|raw }}</label>
                                </div>
                                <div class="form-control_select fc_foxycomplete fc_shipto_{{ multiship.number }}_state_name">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_state_name">{{ lang.checkout_state|raw }}<span class="fc_ast">*</span></label>
                                    <select class="form-control  fc_required fc_location" data-default-value="{{ multiship.region_code }}" id="shipto_{{ multiship.number }}_state" name="shipto_{{ multiship.number }}_state" style="display: none;">
                                    {{ multiship.region_options|raw }}
                                    </select>
                                    <input value="{{ (multiship.region_code == '') ? multiship.region_name : multiship.region_code }}" type="text" class="fc_foxycomplete_input form-control  fc_required fc_location" id="shipto_{{ multiship.number }}_state_name" name="shipto_{{ multiship.number }}_state_name">
                                    <label style="display:none;" class="help-block" for="shipto_{{ multiship.number }}_state_name">{{ lang.checkout_error_state|raw }}</label>
                                </div>
                                <div class="fc_shipto_{{ multiship.number }}_postal_code">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_postal_code">{{ lang.checkout_postal_code|raw }}<span class="fc_ast">*</span></label>
                                    <input type="text" value="{{ multiship.postal_code }}" class="form-control form-control_short fc_required" id="shipto_{{ multiship.number }}_postal_code" name="shipto_{{ multiship.number }}_postal_code" autocomplete="section-{{ multiship.number }} shipping postal-code">
                                    <label style="display:none;" class="help-block" for="shipto_{{ multiship.number }}_postal_code">{{ lang.checkout_error_postal_code|raw }}</label>
                                    <label style="display:none;" class="alert alert-warning alert alert-warning_invalid_postal_code" for="shipto_{{ multiship.number }}_postal_code">{{ lang.checkout_error_invalid_postal_code|raw }}</label>
                                </div>
                            </div>
                            <div{% if multiship_data|length == 1 %} style="display:none;"{% endif %} class="fc_shipto_subtotal">
                                <div class="fc_shipto_{{ multiship.number }}_subtotal">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_subtotal">{{ lang.checkout_shipment_subtotal|raw }}</label>
                                    <span id="shipto_{{ multiship.number }}_subtotal_formatted">{{ multiship.checkout_sub_total|money_format }}</span>
                                    <input type="hidden" value="{{ multiship.checkout_sub_total }}" id="shipto_{{ multiship.number }}_subtotal" name="shipto_{{ multiship.number }}_subtotal" />
                                </div>
                            {% if multiship.has_shipping_or_handling_cost %}
                                <div class="fc_shipto_{{ multiship.number }}_shipping_total">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_shipping_total">{{ multiship.shipping_and_handling_label|raw }}</label>
                                    <span id="shipto_{{ multiship.number }}_shipping_total_formatted">{{ multiship.shipping_total|money_format }}</span>
                                    <input type="hidden" value="{{ multiship.shipping_total }}" class="fc_shipping" id="shipto_{{ multiship.number }}_shipping_total" name="shipto_{{ multiship.number }}_shipping_total" />
                                </div>
                            {% else %}
                                <input type="hidden" name="shipto_{{ multiship.number }}_shipping_total" id="shipto_{{ multiship.number }}_shipping_total" class="fc_shipping" value="0" />
                            {% endif %}
                                <div class="fc_shipto_{{ multiship.number }}_tax_total">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_tax_total">{{ lang.checkout_shipment_tax|raw }}</label>
                                    <span id="shipto_{{ multiship.number }}_tax_total_formatted">{{ multiship.checkout_tax_total|money_format }}</span>
                                    <input type="hidden" value="{{ multiship.checkout_tax_total }}" class="fc_taxes" id="shipto_{{ multiship.number }}_tax_total" name="shipto_{{ multiship.number }}_tax_total" />
                                </div>
                                <div class="fc_shipto_{{ multiship.number }}_total">
                                    <label class="control-label" for="shipto_{{ multiship.number }}_total">{{ lang.checkout_shipment_total|raw }}</label>
                                    <span id="shipto_{{ multiship.number }}_total_formatted">{{ multiship.total|money_format }}</span>
                                    <input type="hidden" value="{{ multiship.total }}" id="shipto_{{ multiship.number }}_total" name="shipto_{{ multiship.number }}_total">
                                </div>
                            </div>
                            ^^multiship_custom_fields_{{ multiship.number }}^^
                            {% if multiship.has_live_rate_shippable_products %}
                                <div class="fc_shipping_methods_container">
                                    <label for="fc_shipto_{{ multiship.number }}_shipping_methods" class="control-label fc_shipping_methods">{{ lang.checkout_shipping_methods|raw }}</label>
                                    <div id="fc_shipto_{{ multiship.number }}_shipping_methods" class="form-control_group_container fc_shipping_methods">
                                        <div id="fc_shipto_{{ multiship.number }}_shipping_result" class="fc_shipping_result">{{ lang.checkout_update_shipping_message|raw }}</div>
                                        <span id="shipto_{{ multiship.number }}_shipping_ajax" class="fc_shipping_ajax" style="display:none">{{ lang.checkout_updating_shipping_options|raw }}<img src="//cdn.foxycart.com/static{{ base_directory }}/images/ajax-loader.gif?ver=1" alt="{{ lang.checkout_loading|raw }}" /></span>
                                        <textarea rows="1" cols="1" name="shipto_{{ multiship.number }}_shipping_options" id="shipto_{{ multiship.number }}_shipping_options" style="display:none;">{{ multiship.shipping_options }}</textarea>
                                        <input type="hidden" name="shipto_{{ multiship.number }}_shipping_service_id" id="shipto_{{ multiship.number }}_shipping_service_id" value="{{ multiship.shipping_service_id }}" />
                                        <input type="hidden" name="shipto_{{ multiship.number }}_shipping_service_description" id="shipto_{{ multiship.number }}_shipping_service_description" value="{{ multiship.shipping_service_description }}" />
                                        <div id="fc_shipto_{{ multiship.number }}_shipping_methods_inner" class="fc_shipping_methods_inner">
                                        {{ multiship.shipping_options_html|raw }}
                                        </div>
                                        <label for="fc_shipto_{{ multiship.number }}_shipping_methods" class="alert alert-warning" style="display:none">{{ lang.checkout_select_shipping_option|raw }}</label>
                                    </div>
                                </div>
                            {% else %}
                                <input type="hidden" name="shipto_{{ multiship.number }}_shipping_service_description" id="shipto_{{ multiship.number }}_shipping_service_description" value="{{ lang.checkout_flat_rate_shipping|raw }}" />
                                <input type="hidden" name="shipto_{{ multiship.number }}_shipping_service_id" id="shipto_{{ multiship.number }}_shipping_service_id" value="-1" />
                            {% endif %}
                            {% if has_downloadables %}
                                <div class="fc_downloadable_message_container">
                                    <p class="fc_downloadable_message">{{ lang.checkout_downloadables_message|raw }}</p>
                                </div>
                            {% endif %}
                            <span class="clearfix">&nbsp;</span>
                        </div><!-- .fc_inner -->
                        <div class="fc_shipto_actions">
                            <a class="fc_shipto_shipto_set" id="fc_shipto_{{ multiship.number }}_shipto_set" href="javascript:;">{{ lang.checkout_confirm_address|raw }}</a>
                            <a class="fc_shipto_shipto_edit" id="fc_shipto_{{ multiship.number }}_shipto_edit" href="javascript:;">{{ lang.checkout_edit_address|raw }}</a>
                        </div>
                    </fieldset><!-- #fc_shipto_{{ multiship.number }} -->
                <span class="clearfix">&nbsp;</span>
                </div>
                <input type="hidden" value="{{ multiship.address_name }}" class="fc_shipto_address_name" id="shipto_{{ multiship.number }}_address_name" name="shipto_{{ multiship.number }}_address_name">
            {% endfor %}
            </div>
            {% endblock multiship_shipping %}



        {% endif %}{# End the has_multiship check #}
        </div><!-- #fc_customer_info_container -->

        {# This place holder is here for backward compatibility so that custom fields will be injected into the correct place. #}
        ^^custom_fields^^


    {% block checkout_shipping_and_summary %}
        <!--  *********** shipping : Delivery &amp; Subtotal ************* -->
        <div id="fc_shipping_container" class="form-group"{% if is_updateinfo %} style="display:none;"{% endif %}>
<!--             <h2>{{ lang.checkout_delivery_and_subtotal|raw }}</h2>
 -->            <fieldset id="fc_shipping">
                <legend>{{ lang.checkout_delivery_and_subtotal|raw }}</legend>
                <div class="fc_inner">
                {% if has_live_rate_shippable_products and not has_multiship %}
                    <div id="fc_shipping_methods_container" class="fc_shipping_methods_container">
                        <label for="fc_shipping_methods" class="control-label fc_shipping_methods">{{ lang.checkout_shipping_methods|raw }}</label>
                        <div id="fc_shipping_methods" class="form-control_group_container fc_shipping_methods">
                            <div id="fc_shipping_result" class="fc_shipping_result">{{ lang.checkout_update_shipping_message|raw }}</div>
                            <span id="shipping_ajax" class="fc_shipping_ajax" style="display:none">{{ lang.checkout_updating_shipping_options|raw }}<img src="//cdn.foxycart.com/static{{ base_directory }}/images/ajax-loader.gif?ver=1" alt="{{ lang.checkout_loading|raw }}" /></span>
                            <textarea rows="1" cols="1" name="shipping_options" id="shipping_options" style="display:none;">{{ shipping_options }}</textarea>
                            <input type="hidden" name="shipping_service_id" id="shipping_service_id" value="{{ shipping_service_id }}" />
                            <input type="hidden" name="shipping_service_description" id="shipping_service_description" value="{{ shipping_service_description }}" />
                            <div id="fc_shipping_methods_inner" class="fc_shipping_methods_inner">
                                {{ shipping_options_html|raw }}
                            </div>
                            <label for="fc_shipping_methods" class="alert alert-warning" style="display:none">{{ lang.checkout_select_shipping_option|raw }}</label>
                        </div>
                    </div>
                {% endif %}
                {% if has_downloadables %}
                    <div class="fc_downloadable_message_container">
                        <p class="fc_downloadable_message">{{ lang.checkout_downloadables_message|raw }}</p>
                    </div>
                {% endif %}
                    <div id="fc_shipping_list">
                        <div class="row">
                            <label for="subtotal" class="control-label col-xs-6">{{ lang.checkout_cart_subtotal|raw }}</label>
                            <span id="subtotal_formatted">{{ checkout_subtotal|money_format }}</span>
                            <input value="{{ checkout_subtotal }}" type="hidden" name="subtotal" id="subtotal" />
                        </div>
                    {% if has_future_products %}
                        <div class="row">
                            <label for="future_subscriptions" class="control-label col-xs-6">{{ lang.cart_future_subscriptions|raw }}</label>
                            <span id="future_subscriptions_formatted">{{ checkout_future_subscriptions|money_format }}</span>
                            <input value="{{ checkout_future_subscriptions }}" type="hidden" name="future_subscriptions" id="future_subscriptions" />
                        </div>
                    {% endif %}
                {% if has_shipping_or_handling_cost %}
                        <div class="row">
                            <label for="shipping_cost" class="control-label col-xs-6">{{ shipping_and_handling_label|raw }}</label>
                            <span id="shipping_cost_formatted">{{ checkout_shipping_cost|money_format }}</span>
                            <input value="{{ checkout_shipping_cost }}" type="hidden" name="shipping_cost" id="shipping_cost" />
                        </div>
                    {% if has_future_products %}
                        <div class="row"{% if not has_future_shipping_and_handling %} style="display:none;"{% endif %}>
                            <label for="future_shipping_cost" class="control-label col-xs-6">{{ lang.cart_future_subscriptions|raw }} {{ shipping_and_handling_label|raw }}</label>
                            <span id="future_shipping_cost_formatted">{{ checkout_future_shipping_cost|money_format }}</span>
                            <input value="{{ checkout_future_shipping_cost }}" type="hidden" name="future_shipping_cost" id="future_shipping_cost" />
                        </div>
                    {% endif %}
                {% endif %}
                    {% if has_discount %}
                        <div class="row">
                            <label for="discount" class="control-label col-xs-6">{{ lang.checkout_discount|raw }}</label>
                            <span id="discount_formatted">{{ checkout_discount|money_format }}</span>
                            <input value="{{ checkout_discount }}" type="hidden" name="discount" id="discount" />
                        </div>
                    {% endif %}
                        <div class="row">
                            <label for="tax" class="control-label col-xs-6">{{ lang.checkout_tax|raw }}</label>
                            <span id="tax_formatted">{{ checkout_tax|money_format }}</span>
                            <input value="{{ checkout_tax }}" type="hidden" name="tax" id="tax" />
                        </div>
                        <div class="row">
                            <label for="order_total" class="control-label col-xs-6">{{ lang.checkout_order_total|raw }}</label>
                            <span id="order_total_formatted" checkout_order_total|money_format }}</span>
                            <input value="{{ checkout_order_total }}" type="hidden" name="order_total" id="order_total" />
                        </div>
                    </div>
                    <span class="clearfix">&nbsp;</span>
                </div><!-- .fc_inner -->
            </fieldset><!-- #fc_shipping -->
            <span class="clearfix">&nbsp;</span>
        </div><!-- #fc_shipping_container -->
    {% endblock checkout_shipping_and_summary %}



    {% block checkout_payment %}
        <!--  *********** payment : Payment Information ************* -->
        <div id="fc_payment_container" class="form-group ">
<!--             <h2>{{ lang.checkout_payment_information|raw }}</h2>
 -->            <fieldset id="fc_payment">
                <legend>{{ lang.checkout_payment_information|raw }}</legend>
                <div class="fc_inner">
                    <div id="fc_payment_list">
                    {% if supports_pay_with_plastic %}
                        <div id="fc_payment_method_plastic_container" class="form-group form-control_payment_method">
                            <label for="fc_payment_method_plastic">
                                <input type="{{ payment_method_input_type }}"{% if payment_method_type == 'plastic' %} checked="checked"{% endif %} name="fc_payment_method" id="fc_payment_method_plastic" value="plastic" autocomplete="off" />
                                <span>{{ lang.checkout_pay_with_credit_card|raw }}</span>
                            </label>
                        {% if has_multiple_payment_options %}
                            <fieldset>
                                <div>
                        {% else %}
                            </div>
                        {% endif %}{# has_multiple_payment_options #}
                                    <div id="li_cc_saved" class="form-group form-control_radio">
                                        <label for="c_card_saved">
                                            <input{% if cc_card_is_saved %} checked="checked"{% endif %} type="radio" name="c_card" value="saved" id="c_card_saved" class="form-control" onclick="FC.checkout.displayNewCC(0)" autocomplete="off" />
                                            <span>{{ lang.checkout_use_saved_payment_info|raw }}</span>
                                            <span id="fc_c_card_saved_number">{{ checkout_cc_number_masked }}</span>
                                        </label>
                                    </div>
                                    <div id="li_cc_new" class="form-group form-control_radio">
                                        <label for="c_card_new">
                                            <input{% if not cc_card_is_saved %} checked="checked"{% endif %} type="radio" name="c_card" value="new" id="c_card_new" class="form-control" onclick="FC.checkout.displayNewCC(1)" autocomplete="off" />
                                            <span>{{ lang.checkout_enter_new_card|raw }}</span>
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <div id="li_cc_number" class="li_cc_number form-group col-sm-10">
                                            <!-- <label for="cc_number" class="control-label">{{ lang.checkout_card_number|raw }}</label> -->
                                            <input type="text" name="cc_number" id="cc_number" class="form-control col-sm-10 fc_required" autocomplete="off" value="{{ cc_number }}" placeholder="{{ lang.checkout_card_number|raw }}" />
                                            <label for="cc_number" class="alert alert-warning" style="display:none">{{ lang.checkout_error_card_number|raw }}</label>
                                        </div>
                                        <div id="li_cc_cvv2" class="li_cc_cvv2 form-group col-sm-2">
                                            <!-- <label for="cc_cvv2" class="control-label">
                                                {{ lang.checkout_verification_code|raw }}
                                                <span id="fc_help_cvv2" class="fc_help">(<a id="fc_help_cvv2_link" class="fc_help fc_jTip" href="https://{{ store_domain }}{{ base_directory }}/checkout.help.php?topic=cvv2&amp;width=308">{{ lang.checkout_question_mark|raw }}</a>)</span>
                                            </label> -->
                                            <input value="{{ cc_cvv2 }}" type="text" name="cc_cvv2" id="cc_cvv2" autocomplete="off" class="form-control fc_required" maxlength="4" placeholder="{{ lang.checkout_verification_code|raw }}" />
                                            <label for="cc_cvv2" class="alert alert-warning" style="display:none">{{ lang.checkout_error_verification_code|raw }}</label>
                                        </div>
                                        <div id="li_cc_issue_number" class="col-sm-2 form-group">

                                            <!-- <label for="cc_issue_number" class="control-label">{{ lang.checkout_issue_number|raw }}</label> -->
                                            <input value="{{ cc_issue_number }}" type="text" name="cc_issue_number" id="cc_issue_number" class="form-control fc_required" maxlength="2" placeholder="{{ lang.checkout_issue_number|raw }}"/>
                                            <label for="cc_issue_number" class="alert alert-warning" style="display:none">{{ lang.checkout_error_issue_number|raw }}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-6 form-group">
                                            <!-- <label class="fc_pre" for="customer_first_name">{{ lang.checkout_first_name|raw }}<span class="fc_ast">*</span></label> -->
                                            <input type="text" class="form-control  fc_required" id="customer_first_name" name="customer_first_name" autocomplete="billing given-name" placeholder="{{ lang.checkout_first_name|raw }}">
                                            <label style="display:none;" class="alert alert-warning" for="customer_first_name" value="customer_first_name">{{ lang.checkout_error_first_name|raw }}</label>
                                        </div>

                                        <!-- <div id="li_cc_start_date_month">
                                            <label for="cc_start_date_month" class="control-label">{{ lang.checkout_start_date|raw }}</label>
                                            <select id="cc_start_date_month" name="cc_start_date_month" class="col-sm-1">
                                                <option value="">{{ lang.cart_month|raw }}</option>
                                                {{ cc_start_date_month_options|raw }}
                                            </select>
                                            <input type="text" class="form-control col-sm-1" id="cc_start_date_month" name="cc_start_date_month" placeholder="{{ lang.checkout_start_date|raw }}">
                                            <input type="text" class="form-control col-sm-1"  id="cc_start_date_year" name="cc_start_date_year" placeholder="{{ lang.cart_year|raw }}">
                                            
                                            <select id="cc_start_date_year" name="cc_start_date_year" class="col-sm-1">
                                                <option value="">{{ lang.cart_year|raw }}</option>
                                                {{ cc_start_date_year_options|raw }}
                                            </select>
                                            <label for="cc_start_date_month" class="alert alert-warning" style="display:none">{{ lang.checkout_error_start_date|raw }}</label>
                                        </div> -->

                                        <div class="col-sm-2 form-group">
                                            <!-- <label class="fc_pre" for="customer_postal_code">{{ lang.checkout_postal_code|raw }}<span class="fc_ast">*</span></label> -->
                                            <input type="text"  class="form-control fc_required" id="customer_postal_code" name="customer_postal_code" autocomplete="billing postal-code" placeholder="{{ lang.checkout_postal_code|raw }}">
                                            <label style="display:none;" class="alert alert-warning" for="customer_postal_code">{{ lang.checkout_error_postal_code|raw }}</label>
                                            <label style="display:none;" class="alert alert-warning fc_error_invalid_postal_code" for="customer_postal_code">{{ lang.checkout_error_invalid_postal_code|raw }}</label>
                                        </div> 

                                   <!--  <div id="li_cc_start_date_month">
                                        <label for="cc_start_date_month" class="control-label">{{ lang.checkout_start_date|raw }}</label>
                                        <input type="text"  class="col-sm-2 form-control " id="cc_start_date_month" name="cc_start_date_month" placeholder="{{ lang.cart_month|raw }}">
                                            <option value="">{{ lang.cart_month|raw }}</option>
                                            {{ cc_start_date_month_options|raw }}
                                        </input>
                                        <input type="text" class="col-sm-2 form-control " id="cc_start_date_year" name="cc_start_date_year" placeholder="{{ lang.cart_year|raw }}">
                                            <option value="">{{ lang.cart_year|raw }}</option>
                                            {{ cc_start_date_year_options|raw }}
                                        </input>
                                        <label for="cc_start_date_month" class="alert alert-warning" style="display:none">{{ lang.checkout_error_start_date|raw }}</label>
                                    </div> -->
                                    <div id="li_cc_exp_month" class="col-sm-2 form-group">
                                        <!-- <label for="cc_exp_month" class="control-label">{{ lang.checkout_expiration|raw }}</label> -->
                                        <input type="text" class="form-control"  id="cc_exp_month" name="cc_exp_month" placeholder="{{ lang.cart_month|raw }}">
                                            <!-- <option value="">{{ lang.cart_month|raw }}</option>
                                            {{ cc_expiration_month_options|raw }} -->
                                        </input>
                                    </div>
                                    <div class="col-sm-2 form-group">
                                        <input type="text" class="form-control " id="cc_exp_year" name="cc_exp_year" placeholder="{{ lang.cart_year|raw }}">
                                           <!--  <option value="">{{ lang.cart_year|raw }}</option>
                                            {{ cc_expiration_year_options|raw }} -->
                                        </input>
                                        <label for="cc_exp_month" class="alert alert-warning" style="display:none">{{ lang.checkout_error_expiration|raw }}</label>
                                    </div>





                                    </div>

                                                                            
                                        <div class="checkbox" id="li_save_cc">
                                            <label>
                                                <input type="checkbox" name="save_cc" id="save_cc" value="1">{{ save_cc_text }}
                                            </label>
                                            <label for="save_cc" class="alert alert-warning" style="display:none">{{ lang.checkout_error_subscription_permission|raw }}</label>
                                            <input type="hidden" name="cc_number_masked" id="cc_number_masked" value="{{ checkout_cc_number_masked }}" />

                                        </div>

                        {% if has_multiple_payment_options %}
                                </div>
                            </fieldset>
                        </div>
                        {% endif %}{# has_multiple_payment_options #}
                    {% endif %}{# supports_pay_with_plastic #}

                    {% if supports_paypal_express and not is_updateinfo %}
                        <div id="fc_payment_method_paypal_container" class="form-control_payment_method">
                        {% if has_multiple_payment_options %}
                            <label for="fc_payment_method_paypal" class="form-control">
                                <input type="{{ payment_method_input_type }}"{% if payment_method_type == 'paypal' %} checked="checked"{% endif %} name="fc_payment_method" id="fc_payment_method_paypal" class="form-control" value="paypal" autocomplete="off" />
                                <span>{{ lang.checkout_pay_with_paypal|raw }}</span>
                            </label>
                        {% else %}
                            <input type="hidden" name="fc_payment_method" id="fc_payment_method" value="paypal" />
                            <span>{{ lang.checkout_pay_with_paypal|raw }}</span>
                        {% endif %}
                            <fieldset>
                                <p>{{ paypal_description|raw }}</p>
                            </fieldset>
                        </div>
                    {% endif %}{# supports_paypal_express and not is_updateinfo #}

                    {% if not is_updateinfo %}
                    {% for hosted_gateway in hosted_payment_gateways %}
                        <div id="fc_payment_method_{{ hosted_gateway.type }}_container" class="form-control_payment_method form-control_hosted_payment_method">
                        {% if has_multiple_payment_options %}
                            <label class="form-control">
                                <input type="{{ payment_method_input_type }}"{% if payment_method_type == hosted_gateway.type %} checked="checked"{% endif %} name="fc_payment_method" id="fc_payment_method_{{ hosted_gateway.type }}" class="form-control" value="{{ hosted_gateway.type }}" autocomplete="off" />
                                <span>{{ hosted_gateway.lang_pay_with|raw }}</span>
                            </label>
                        {% else %}
                            <input type="hidden" name="fc_payment_method" id="fc_payment_method_{{ hosted_gateway.type }}" value="{{ hosted_gateway.type }}" />
                            <span>{{ hosted_gateway.lang_pay_with|raw }}</span>
                        {% endif %}
                            <fieldset>
                                <p>{{ hosted_gateway.lang_payment_method|raw }}</p>
                            </fieldset>
                        </div>
                    {% endfor %}
                    {% endif %}{# not is_updateinfo #}

                    {% if supports_purchase_order and not is_updateinfo %}
                        <div id="fc_payment_method_purchase_order_container" class="form-control_payment_method">
                            <label for="fc_payment_method_purchase_order">
                                <input type="{{ payment_method_input_type }}"{% if payment_method_type == 'purchase_order' %} checked="checked"{% endif %} name="fc_payment_method" id="fc_payment_method_purchase_order" class="form-control" value="purchase_order" autocomplete="off" />
                                <span>{{ lang.checkout_pay_with_purchase_order|raw }}</span>
                            </label>
                        {% if has_multiple_payment_options %}
                            <fieldset>
                                <div>
                        {% else %}
                        </div>
                        {% endif %}{# has_multiple_payment_options #}
                                    <div id="li_purchase_order" class="li_purchase_order">
                                        <label for="purchase_order" class="control-label">
                                            {{ lang.checkout_purchase_order_number|raw }}
                                        </label>
                                        <input value="{{ purchase_order }}" type="text" name="purchase_order" id="purchase_order" class="form-control fc_required" />
                                        <label for="purchase_order" class="alert alert-warning" style="display:none">{{ lang.checkout_error_purchase_order|raw }}</label>
                                    </div>
                        {% if has_multiple_payment_options %}
                                </div>
                            </fieldset>
                        </div>
                        {% endif %}{# has_multiple_payment_options #}
                    {% endif %}{# supports_purchase_order and not is_updateinfo #}

                        <div id="li_nopayment">
                            {# This is used for $0 transactions and other situations where no payment info is collected #}
                            {{ lang.checkout_no_payment_needed|raw }}
                        </div>
                    </div>

                    <div id="fc_complete_order_button_container" class="center">
                        <button id="fc_complete_order_button" class="btn btn-primary btn-lg fc_button{{ submit_button_class }}" type="button" value="{{ submit_button_value }}" onclick="FC.checkout.validateAndSubmit()">{{ submit_button_value }}</button>
                        <div id="fc_complete_order_processing" style="display:none;"><strong class="alert alert-warning"></strong> <br /><img src="//cdn.foxycart.com/static{{ base_directory }}/images/ajax-loader.gif?ver=1" alt="{{ lang.checkout_loading|raw }}" width="220" height="19" /></div>
                    </div><!-- #fc_complete_order_button_container -->

                    <span class="clearfix">&nbsp;</span>
                </div><!-- .fc_inner -->
            </fieldset><!-- #fc_payment -->
            <span class="clearfix">&nbsp;</span>
        </div><!-- #fc_payment_container -->
    {% endblock checkout_payment %}



    </div><!-- #fc_data_entry_container -->



    {% else %} {# is_subscription_cancel #}



        {% block subscription_cancel %}
        <div id="fc_subscription_cancel_message">
            {{ lang.checkout_subscription_cancel_message|raw }}
        </div><!-- #fc_subscription_cancel_message -->

        <div id="fc_complete_order_button_container" class="form-control_actions center">
            <button id="fc_complete_order_button" class="btn btn-primary btn-lg fc_button{{ submit_button_class }}" type="button" value="{{ submit_button_value }}" onclick="FC.checkout.validateAndSubmit()">{{ submit_button_value }}</button>
            <div id="fc_complete_order_processing" style="display:none;"><strong class="alert alert-warning"></strong> <br /><img src="//cdn.foxycart.com/static{{ base_directory }}/images/ajax-loader.gif?ver=1" alt="{{ lang.checkout_loading|raw }}" width="220" height="19" /></div>
        </div><!-- #fc_complete_order_button_container -->
        {% endblock subscription_cancel %}



    {% endif %}{# not is_subscription_cancel #}



</form>
    </div>
    </div><!-- #fc_data_entry_container -->
<span class="fc_clear">&nbsp;</span>



{# END CHECKOUT TWIG TEMPLATE #}
{% endblock checkout %}

</div><!-- #container -->


<!-- end page content -->

<?php
include_once('footer.php');
?>