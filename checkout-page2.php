<?php

$PageTitle="Checkout Page - Sockscribe Me - Awesome Socks Delivered to Your Door Monthly";
$page = "Checkout";
function customPageHeader(){?>

  <!--Arbitrary HTML Tags-->
<?php }

include_once('header.php');
?>


<!-- begin page content -->

<div class="container">
      
    <div class="page-header">
        <h1>Checkout  <small>You are 1 step away for happiness</small></h1>
    </div>

{% block checkout %}

{# BEGIN CHECKOUT TWIG TEMPLATE #}
<!-- ###########################################################################
BEGIN checkout
########################################################################### -->

<!--  *********** fc_checkout_container ************* -->
<div id="fc_checkout_container">{{ html_messages|raw }}
<form id="fc_form_checkout" method="post" action="https://{{ store_domain }}{{ post_url }}" onsubmit="return false;">

    <div class="col-sm-8 col-sm-offset-2" id="fc_login_register_container">


        {% block checkout_error %}
        <div id="fc_form_checkout_error" class="fc_error" style="display:none">{{ lang.checkout_required_info_missing|raw }}</div>
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


        {% block noscript_warning %}
        <noscript>
            <div id="fc_error_noscript" class="fc_error">
                <h3>{{ lang.checkout_warning|raw }}</h3>
                <p>{{ lang.checkout_missing_message|raw }}</p>
            </div><!-- #fc_errorNoScript -->
        </noscript>
        {% endblock noscript_warning %}

    </div>


    {% block login_register %}
    <!--  *********** login_register : Login or Register ************* -->
    <div class="form-group col-sm-8 col-sm-offset-2" id="fc_login_register_container">
        <div class="shaded-form col-md-8 col-md-offset-2">
        <fieldset id="fc_login_register">
            <legend>{% if checkout_type == 'guest_only' %}{{ lang.checkout_as_guest|raw }}{% else %}{{ lang.checkout_login_or_register|raw }}{% endif %}</legend>
            <div class="fc_inner">
                <ol id="fc_login_register_list">
            {% if not customer_is_authenticated %}
                    <li id="li_customer_email" class="row fc_customer_email">
                        <label class="fc_pre" for="customer_email">{{ lang.checkout_email|raw }}<span class="fc_ast">*</span></label>
                        <input type="text" value="{{ email }}" autocomplete="off" class="form-control fc_text_long fc_required" id="customer_email" name="customer_email">
                        <label style="display:none;" class="fc_error" for="customer_email">{{ lang.checkout_error_email|raw }}</label>
                        <p class="fc_account_message" id="fc_account_message_status">
                            {{ lang.checkout_instructions_email|raw }}
                        </p>
                        <span style="display:none" id="login_ajax"><img alt="{{ lang.checkout_loading|raw }}" src="//cdn.foxycart.com/static{{ base_directory }}/images/ajax-loader.gif?ver=1"></span>
                        <p style="display:none;" class="fc_account_message" id="fc_account_message_explanation"></p>
                    </li>
                {% if not is_updateinfo and checkout_type != 'guest_only' and checkout_type != 'account_only' %}
                    <li class="row fc_row_radio fc_guest_checkout">
                        <label for="is_anonymous_1" class="fc_radio">
                            <input type="radio" name="is_anonymous" value="1" id="is_anonymous_1" class="fc_radio"{% if default_to_guest %} checked="checked"{% endif %} autocomplete="off"/>
                            <span>{{ lang.checkout_as_guest|raw }}</span>
                        </label>
                    </li>
                    <li class="row fc_row_radio fc_guest_checkout">
                        <label for="is_anonymous_0" class="fc_radio">
                            <input type="radio" name="is_anonymous" value="0" id="is_anonymous_0" class="fc_radio"{% if not default_to_guest %} checked="checked"{% endif %} autocomplete="off" />
                            <span>{{ lang.checkout_as_customer|raw }}</span>
                        </label>
                    </li>
                {% else %}
                    {% if checkout_type == 'guest_only' %}
                        <input type="hidden" name="is_anonymous" id="is_anonymous" value="1" />
                    {% else %}
                        <input type="hidden" name="is_anonymous" id="is_anonymous" value="0" />
                    {% endif %}
                {% endif %}
            {% else %}
                    <li class="row fc_customer_email" id="li_customer_email">
                        <span class="fc_pre">{{ lang.checkout_email|raw }}<span class="fc_ast">*</span></span>
                        <span id="customer_email_authenticated" class="form-control">{{ email }}</span>
                        <input type="hidden" name="customer_email" id="customer_email" value="{{ email }}" />
                        <label for="customer_email" class="fc_error" style="display:none;">{{ lang.checkout_error_email|raw }}</label>
                        <p id="fc_account_message_sso" class="fc_account_message">{{ lang.checkout_sso_already_logged_in|raw }}</p
                    </li>
            {% endif %}
                    <li id="li_customer_password" style="display:none;" class="row fc_customer_password">
                        <p style="display:none;" class="fc_account_message" id="fc_account_message_password"></p>
                        <label class="fc_pre" for="customer_password">{{ lang.checkout_password|raw }}</label>
                        <input type="password" value="{{ customer_password }}" autocomplete="off" class="form-control fc_text_long" id="customer_password" name="customer_password">
                        <label style="display:none;" class="fc_error" for="customer_password">{{ lang.checkout_error_password|raw }}</label>
                    </li>
                    <li id="li_customer_password2" style="display:none;" class="row fc_customer_password2">
                        <label class="fc_pre" for="customer_password2">{{ lang.checkout_retype_password|raw }}</label>
                        <input type="password" value="{{ customer_password }}" autocomplete="off" class="form-control fc_text_long" onchange="FC.checkout.checkPasswords()" id="customer_password2" name="customer_password2">
                        <label style="display:none;" class="fc_error" for="customer_password2">{{ lang.checkout_error_retype_password|raw }}</label>
                    </li>
                    <li id="li_customer_email_password" class="row" style="display:none">
                        <label for="fc_email_password" class="fc_error"><a id="fc_email_password" href="javascript:;" onclick="FC.checkout.emailPassword()">{{ lang.checkout_email_my_password|raw }}</a></label>
                    </li>
                    <li id="li_customer_new_password" class="row" style="display:none">
                        <label for="fc_new_password"><a id="fc_new_password" href="javascript:;" onclick="FC.checkout.newPassword()">{{ lang.checkout_change_my_password|raw }}</a></label>
                    </li>
                </ol>
                <input type="hidden" name="email_found" id="email_found" value="{{ email_found }}" />
                <div id="fc_continue" class="row fc_row_actions center"><a href="#" onclick="FC.checkout.checkLogin(); return false;" class="btn btn-default">{{ lang.checkout_continue|raw }}</a></div>
                <span class="fc_clear">&nbsp;</span>
            </div><!-- .fc_inner -->
        </fieldset><!-- #fc_login_register -->
        <span class="fc_clear">&nbsp;</span>
    </div>
        </div><!-- #fc_login_register_container -->
    {% endblock login_register %}


    <div class="col-sm-7">

        {% if not is_subscription_cancel %}
        <div id="fc_data_entry_container">
            <div id="fc_customer_info_container">




            {% block customer_billing %}
                <!--  *********** customer_billing : Billing Address ************* -->
                <div class="form-group" id="fc_customer_billing_container">
                    <fieldset id="fc_customer_billing">
                        <legend>{{ lang.checkout_billing_address|raw }}</legend>
                        <div class="fc_inner">
                            <ol id="fc_customer_billing_list">
                                <li class="row fc_row_select fc_foxycomplete fc_customer_country_name hide">
                                    <label class="fc_pre" for="customer_country_name">{{ lang.checkout_country|raw }}<span class="fc_ast">*</span></label>
                                    <select class="form-control fc_text_long fc_required fc_location" data-default-value="{{ country_code }}" id="customer_country" name="customer_country">
                                    {{ country_options|raw }}
                                    </select>
                                    <input value="US" type="text" style="display:none;" class="fc_foxycomplete_input form-control fc_text_long fc_required fc_location" id="customer_country_name" name="customer_country_name">
                                    <label style="display:none;" class="fc_error" for="customer_country_name">{{ lang.checkout_error_country|raw }}</label>
                                </li>

                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <li class="fc_customer_first_name">
<!--                                             <label class="fc_pre" for="customer_first_name">{{ lang.checkout_first_name|raw }}<span class="fc_ast">*</span></label>
 -->                                            <input type="text" value="{{ first_name }}" class="form-control fc_text_long fc_required" id="customer_first_name" name="customer_first_name" autocomplete="billing given-name" placeholder="{{ lang.checkout_first_name|raw }}">
                                            <label style="display:none;" class="fc_error" for="customer_first_name">{{ lang.checkout_error_first_name|raw }}</label>
                                        </li>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <li class="fc_customer_last_name">
<!--                                             <label class="fc_pre" for="customer_last_name">{{ lang.checkout_last_name|raw }}<span class="fc_ast">*</span></label>
 -->                                            <input type="text" value="{{ last_name }}" class="form-control fc_text_long fc_required" id="customer_last_name" name="customer_last_name" autocomplete="billing family-name" placeholder="{{ lang.checkout_last_name|raw }}">
                                            <label style="display:none;" class="fc_error" for="customer_last_name">{{ lang.checkout_error_last_name|raw }}</label>
                                        </li>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-8 form-group">
                                        <li class="fc_customer_address1">
<!--                                             <label class="fc_pre" for="customer_address1">{{ lang.checkout_address1|raw }}<span class="fc_ast">*</span></label>
 -->                                            <input type="text" value="{{ address1 }}" class="form-control fc_text_long fc_required" id="customer_address1" name="customer_address1" autocomplete="billing address-line1" placeholder="{{ lang.checkout_address1|raw }}">
                                            <label style="display:none;" class="fc_error" for="customer_address1">{{ lang.checkout_error_address1|raw }}</label>
                                        </li>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <li class="fc_customer_address2">
<!--                                             <label class="fc_pre" for="customer_address2">{{ lang.checkout_address2|raw }}</label>
 -->                                            <input type="text" value="{{ address2 }}" class="form-control fc_text_long" id="customer_address2" name="customer_address2" autocomplete="billing address-line2" placeholder="{{ lang.checkout_address2|raw }}">
                                        </li>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-5 form-group">
                                        <li class="fc_customer_city">
<!--                                             <label class="fc_pre" for="customer_city">{{ lang.checkout_city|raw }}<span class="fc_ast">*</span></label>
 -->                                            <input type="text" value="{{ city }}" class="form-control fc_text_long fc_required" id="customer_city" name="customer_city" autocomplete="billing locality" placeholder="{{ lang.checkout_city|raw }}">
                                            <label style="display:none;" class="fc_error" for="customer_city">{{ lang.checkout_error_city|raw }}</label>
                                        </li>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <li class="fc_row_select fc_foxycomplete fc_customer_state_name">
<!--                                             <label class="fc_pre" for="customer_state_name">{{ lang.checkout_state|raw }}<span class="fc_ast">*</span></label>
 -->                                             <select class="form-control fc_text_long fc_required" data-default-value="{{ region_name }}" id="customer_state_name" name="customer_state_name"> 
                                                <option value="" selected="selected">Select a State</option> 
                                                <option value="AL">Alabama</option> 
                                                <option value="AK">Alaska</option> 
                                                <option value="AZ">Arizona</option> 
                                                <option value="AR">Arkansas</option> 
                                                <option value="CA">California</option> 
                                                <option value="CO">Colorado</option> 
                                                <option value="CT">Connecticut</option> 
                                                <option value="DE">Delaware</option> 
                                                <option value="DC">District Of Columbia</option> 
                                                <option value="FL">Florida</option> 
                                                <option value="GA">Georgia</option> 
                                                <option value="ID">Idaho</option> 
                                                <option value="IL">Illinois</option> 
                                                <option value="IN">Indiana</option> 
                                                <option value="IA">Iowa</option> 
                                                <option value="KS">Kansas</option> 
                                                <option value="KY">Kentucky</option> 
                                                <option value="LA">Louisiana</option> 
                                                <option value="ME">Maine</option> 
                                                <option value="MD">Maryland</option> 
                                                <option value="MA">Massachusetts</option> 
                                                <option value="MI">Michigan</option> 
                                                <option value="MN">Minnesota</option> 
                                                <option value="MS">Mississippi</option> 
                                                <option value="MO">Missouri</option> 
                                                <option value="MT">Montana</option> 
                                                <option value="NE">Nebraska</option> 
                                                <option value="NV">Nevada</option> 
                                                <option value="NH">New Hampshire</option> 
                                                <option value="NJ">New Jersey</option> 
                                                <option value="NM">New Mexico</option> 
                                                <option value="NY">New York</option> 
                                                <option value="NC">North Carolina</option> 
                                                <option value="ND">North Dakota</option> 
                                                <option value="OH">Ohio</option> 
                                                <option value="OK">Oklahoma</option> 
                                                <option value="OR">Oregon</option> 
                                                <option value="PA">Pennsylvania</option> 
                                                <option value="RI">Rhode Island</option> 
                                                <option value="SC">South Carolina</option> 
                                                <option value="SD">South Dakota</option> 
                                                <option value="TN">Tennessee</option> 
                                                <option value="TX">Texas</option> 
                                                <option value="UT">Utah</option> 
                                                <option value="VT">Vermont</option> 
                                                <option value="VA">Virginia</option> 
                                                <option value="WA">Washington</option> 
                                                <option value="WV">West Virginia</option> 
                                                <option value="WI">Wisconsin</option> 
                                                <option value="WY">Wyoming</option>
                                            </select>
                                            <label style="display:none;" class="fc_error" for="customer_state_name">{{ lang.checkout_error_state|raw }}</label>
                                        </li>
                                    </div>
                                
                                <div class="col-sm-3 form-group">
                                        <li class="fc_customer_postal_code">
<!--                                         <label class="fc_pre" for="customer_postal_code">{{ lang.checkout_postal_code|raw }}<span class="fc_ast">*</span></label>
 -->                                        <input type="text" value="{{ postal_code }}" class="form-control fc_text_short fc_required" id="customer_postal_code" name="customer_postal_code" autocomplete="billing postal-code" placeholder="{{ lang.checkout_postal_code|raw }}">
                                        <label style="display:none;" class="fc_error" for="customer_postal_code">{{ lang.checkout_error_postal_code|raw }}</label>
                                        <label style="display:none;" class="fc_error fc_error_invalid_postal_code" for="customer_postal_code">{{ lang.checkout_error_invalid_postal_code|raw }}</label>
                                    </li>
                                </div>
                            </div>
                            </ol>
                        {% if has_shippable_products and not has_multiship %}
                            <div class="checkbox fc_row_checkbox" id="fc_use_different_address">
                                <label class="fc_checkbox" for="use_different_addresses">
                                    <input{% if use_alternate_shipping_address %} checked="checked"{% endif %} type="checkbox" onclick="FC.checkout.displayShippingAddress(this)" class="checkbox" value="1" id="use_different_addresses" name="use_different_addresses">
                                    {{ lang.checkout_use_shipping_address|raw }}
                                </label>
                            </div>

                        {% endif %}
                        </div><!-- .fc_inner -->
                    </fieldset><!-- #fc_customer_billing -->
                </div>
            {% endblock customer_billing %}



            {% if not has_multiship %}



                {% block customer_shipping %}
                <!--  *********** address_shipping : Shipping Address ************* -->
                <div style="display: none;" class="form-group" id="fc_address_shipping_container">
                    <fieldset id="fc_shipping_address">
                        <legend>{{ lang.checkout_shipping_address|raw }}</legend>
                        <div class="fc_inner">
                            <ol id="fc_address_shipping_list">
                                <li class="row fc_row_select fc_foxycomplete fc_shipping_country_name hide">
                                    <label class="fc_pre" for="shipping_country_name">{{ lang.checkout_country|raw }}<span class="fc_ast">*</span></label>
                                    <select class="form-control fc_text_long fc_required fc_location" data-default-value="{{ country_code }}" id="shipping_country" name="shipping_country">
                                    {{ shipping_country_options|raw }}
                                    </select>                                    
                                    <input value="US" type="text" style="display:none;" class="fc_foxycomplete_input form-control fc_text_long fc_required fc_location" id="shipping_country_name" name="shipping_country_name">
                                    <label style="display:none;" class="fc_error" for="shipping_country_name">{{ lang.checkout_error_country|raw }}</label>
                                </li>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <li class="fc_shipping_first_name">
                                            <label class="fc_pre" for="shipping_first_name">{{ lang.checkout_first_name|raw }}<span class="fc_ast">*</span></label>
                                            <input type="text" value="{{ shipping_first_name }}" class="form-control fc_text_long fc_required" id="shipping_first_name" name="shipping_first_name" autocomplete="shipping given-name">
                                            <label style="display:none;" class="fc_error" for="shipping_first_name">{{ lang.checkout_error_first_name|raw }}</label>
                                        </li>
                                    </div>
                                    <div class="col-sm-6">
                                        <li class="fc_shipping_last_name">
                                            <label class="fc_pre" for="shipping_last_name">{{ lang.checkout_last_name|raw }}<span class="fc_ast">*</span></label>
                                            <input type="text" value="{{ shipping_last_name }}" class="form-control fc_text_long fc_required" id="shipping_last_name" name="shipping_last_name" autocomplete="shipping family-name">
                                            <label style="display:none;" class="fc_error" for="shipping_last_name">{{ lang.checkout_error_last_name|raw }}</label>
                                        </li>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <li class="fc_shipping_address1">
                                            <label class="fc_pre" for="shipping_address1">{{ lang.checkout_address1|raw }}<span class="fc_ast">*</span></label>
                                            <input type="text" value="{{ shipping_address1 }}" class="form-control fc_text_long fc_required" id="shipping_address1" name="shipping_address1" autocomplete="shipping address-line1">
                                            <label style="display:none;" class="fc_error" for="shipping_address1">{{ lang.checkout_error_address1|raw }}</label>
                                        </li>
                                    </div>
                                    <div class="col-sm-4">
                                        <li class="fc_shipping_address2">
                                            <label class="fc_pre" for="shipping_address2">{{ lang.checkout_address2|raw }}</label>
                                            <input type="text" value="{{ shipping_address2 }}" class="form-control fc_text_long" id="shipping_address2" name="shipping_address2" autocomplete="shipping address-line2">
                                        </li>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-5">
                                        <li class="fc_shipping_city">
                                            <label class="fc_pre" for="shipping_city">{{ lang.checkout_city|raw }}<span class="fc_ast">*</span></label>
                                            <input type="text" value="{{ shipping_city }}" class="form-control fc_text_long fc_required" id="shipping_city" name="shipping_city" autocomplete="shipping locality">
                                            <label style="display:none;" class="fc_error" for="shipping_city">{{ lang.checkout_error_city|raw }}</label>
                                        </li>
                                    </div>
                                    <div class="col-sm-4">
                                        <li class="fc_row_select fc_foxycomplete fc_shipping_state_name">
                                            <label class="fc_pre" for="shipping_state_name">{{ lang.checkout_state|raw }}<span class="fc_ast">*</span></label>
                                            <select class="form-control" data-default-value="{{ shipping_region_name }}" id="shipping_state_name" name="shipping_state_name"> 
                                                <option value="" selected="selected">Select a State</option> 
                                                <option value="AL">Alabama</option> 
                                                <option value="AK">Alaska</option> 
                                                <option value="AZ">Arizona</option> 
                                                <option value="AR">Arkansas</option> 
                                                <option value="CA">California</option> 
                                                <option value="CO">Colorado</option> 
                                                <option value="CT">Connecticut</option> 
                                                <option value="DE">Delaware</option> 
                                                <option value="DC">District Of Columbia</option> 
                                                <option value="FL">Florida</option> 
                                                <option value="GA">Georgia</option> 
                                                <option value="ID">Idaho</option> 
                                                <option value="IL">Illinois</option> 
                                                <option value="IN">Indiana</option> 
                                                <option value="IA">Iowa</option> 
                                                <option value="KS">Kansas</option> 
                                                <option value="KY">Kentucky</option> 
                                                <option value="LA">Louisiana</option> 
                                                <option value="ME">Maine</option> 
                                                <option value="MD">Maryland</option> 
                                                <option value="MA">Massachusetts</option> 
                                                <option value="MI">Michigan</option> 
                                                <option value="MN">Minnesota</option> 
                                                <option value="MS">Mississippi</option> 
                                                <option value="MO">Missouri</option> 
                                                <option value="MT">Montana</option> 
                                                <option value="NE">Nebraska</option> 
                                                <option value="NV">Nevada</option> 
                                                <option value="NH">New Hampshire</option> 
                                                <option value="NJ">New Jersey</option> 
                                                <option value="NM">New Mexico</option> 
                                                <option value="NY">New York</option> 
                                                <option value="NC">North Carolina</option> 
                                                <option value="ND">North Dakota</option> 
                                                <option value="OH">Ohio</option> 
                                                <option value="OK">Oklahoma</option> 
                                                <option value="OR">Oregon</option> 
                                                <option value="PA">Pennsylvania</option> 
                                                <option value="RI">Rhode Island</option> 
                                                <option value="SC">South Carolina</option> 
                                                <option value="SD">South Dakota</option> 
                                                <option value="TN">Tennessee</option> 
                                                <option value="TX">Texas</option> 
                                                <option value="UT">Utah</option> 
                                                <option value="VT">Vermont</option> 
                                                <option value="VA">Virginia</option> 
                                                <option value="WA">Washington</option> 
                                                <option value="WV">West Virginia</option> 
                                                <option value="WI">Wisconsin</option> 
                                                <option value="WY">Wyoming</option>
                                            </select>
                                            <label style="display:none;" class="fc_error" for="shipping_state_name">{{ lang.checkout_error_state|raw }}</label>
                                        </li>
                                    </div>
                                    <div class="col-sm-3">
                                        <li class="fc_shipping_postal_code">
                                            <label class="fc_pre" for="shipping_postal_code">{{ lang.checkout_postal_code|raw }}<span class="fc_ast">*</span></label>
                                            <input type="text" value="{{ shipping_postal_code }}" class="form-control fc_text_short fc_required" id="shipping_postal_code" name="shipping_postal_code" autocomplete="shipping postal-code">
                                            <label style="display:none;" class="fc_error" for="shipping_postal_code">{{ lang.checkout_error_postal_code|raw }}</label>
                                            <label style="display:none;" class="fc_error fc_error_invalid_postal_code" for="shipping_postal_code">{{ lang.checkout_error_invalid_postal_code|raw }}</label>
                                        </li>
                                    </div>
                                </div>
                            </ol>
                            <div class="row" id="fc_copy_billing_address">
                                <p><a href='#' onclick='FC.checkout.copyBillingToShipping(); return false;'>{{ lang.checkout_copy_billing_address_to_shipping|raw }}</a></p>
                            </div>
                            <span class="fc_clear">&nbsp;</span>
                        </div><!-- .fc_inner -->
                    </fieldset><!-- #fc_address_shipping -->
                    <span class="fc_clear">&nbsp;</span>
                </div>
                {% endblock customer_shipping %}



            {% else %}{# If the store has multiship enabled #}



                {% block multiship_shipping %}
                <!--  *********** fc_shipto_# : Ship To: ************* -->
                <div id="fc_address_multiship_container">
                {% for multiship in multiship_data %}
                    <div class="form-group" id="fc_shipto_{{ multiship.number }}_container">
                        <fieldset id="fc_shipto_{{ multiship.number }}">
                            <legend>{{ lang.checkout_shipto|raw }} <span class="fc_shipto_name">{{ multiship.address_name }}</span></legend>
                            <div style="display:none;" class="fc_inner fc_shipto_display" id="fc_shipto_{{ multiship.number }}_display"></div>
                            <div class="fc_inner fc_shipto_entry" id="fc_shipto_{{ multiship.number }}_entry">
                                <ol id="fc_shipto_{{ multiship.number }}_list">
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                        <li id="li_shipto_{{ multiship.number }}_select" class="row li_shipping_select">
    <!--                                         <label for="shipto_{{ multiship.number }}_select" class="fc_pre">{{ lang.checkout_multiship_use_address|raw }}</label>
     -->                                        <select id="shipto_{{ multiship.number }}_select" class="form-control" name="shipto_{{ multiship.number }}_select" onchange="FC.checkout.selectAddress({{ multiship.number }},this)">
                                            <option value="" selected="selected">{{ lang.checkout_multiship_new_address|raw }}</option>
                                            <option value="-1">{{ lang.checkout_multiship_use_billing_address|raw }}</option>
                                            </select>
                                        </li>
                                    </div>
                                    </div>
                                    <li class="row fc_row_select fc_foxycomplete fc_shipto_{{ multiship.number }}_country_name hide">
                                        <label class="fc_pre" for="shipto_{{ multiship.number }}_country_name">{{ lang.checkout_country|raw }}<span class="fc_ast">*</span></label>
                                        <select class="form-control fc_text_long fc_required fc_location" data-default-value="" id="shipto_{{ multiship.number }}_country" name="shipto_{{ multiship.number }}_country">
                                        {{ multiship.country_options|raw }}
                                        </select>
                                        <input value="US" type="text" style="display:none;" class="fc_foxycomplete_input form-control fc_text_long fc_required fc_location" id="shipto_{{ multiship.number }}_country_name" name="shipto_{{ multiship.number }}_country_name">
                                        <label style="display:none;" class="fc_error" for="shipto_{{ multiship.number }}_country_name">{{ lang.checkout_error_country|raw }}</label>
                                    </li>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <li class="fc_shipto_{{ multiship.number }}_first_name">
<!--                                                 <label class="fc_pre" for="shipto_{{ multiship.number }}_first_name">{{ lang.checkout_first_name|raw }}<span class="fc_ast">*</span></label>
 -->                                                <input type="text" value="{{ multiship.first_name }}" class="form-control fc_text_long fc_required" id="shipto_{{ multiship.number }}_first_name" name="shipto_{{ multiship.number }}_first_name" autocomplete="section-{{ multiship.number }} shipping given-name" placeholder="{{ lang.checkout_first_name|raw }}">
                                                <label style="display:none;" class="fc_error" for="shipto_{{ multiship.number }}_first_name">{{ lang.checkout_error_first_name|raw }}</label>
                                            </li>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <li class="fc_shipto_{{ multiship.number }}_last_name">
<!--                                                 <label class="fc_pre" for="shipto_{{ multiship.number }}_last_name">{{ lang.checkout_last_name|raw }}<span class="fc_ast">*</span></label>
 -->                                                <input type="text" value="{{ multiship.last_name }}" class="form-control fc_text_long fc_required" id="shipto_{{ multiship.number }}_last_name" name="shipto_{{ multiship.number }}_last_name" autocomplete="section-{{ multiship.number }} shipping family-name" placeholder="{{ lang.checkout_last_name|raw }}"> 
                                                <label style="display:none;" class="fc_error" for="shipto_{{ multiship.number }}_last_name">{{ lang.checkout_error_last_name|raw }}</label>
                                            </li>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8 form-group">
                                            <li class="fc_shipto_{{ multiship.number }}_address1">
<!--                                                 <label class="fc_pre" for="shipto_{{ multiship.number }}_address1">{{ lang.checkout_address1|raw }}<span class="fc_ast">*</span></label>
 -->                                                <input type="text" value="{{ multiship.address1 }}" class="form-control fc_text_long fc_required" id="shipto_{{ multiship.number }}_address1" name="shipto_{{ multiship.number }}_address1" autocomplete="section-{{ multiship.number }} shipping address-line1" placeholder="{{ lang.checkout_address1|raw }}">
                                                <label style="display:none;" class="fc_error" for="shipto_{{ multiship.number }}_address1">{{ lang.checkout_error_address1|raw }}</label>
                                            </li>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <li class="fc_shipto_{{ multiship.number }}_address2">
<!--                                                 <label class="fc_pre" for="shipto_{{ multiship.number }}_address2">{{ lang.checkout_address2|raw }}</label>
 -->                                                <input type="text" value="{{ multiship.address2 }}" class="form-control fc_text_long" id="shipto_{{ multiship.number }}_address2" name="shipto_{{ multiship.number }}_address2" autocomplete="section-{{ multiship.number }} shipping address-line2" placeholder="{{ lang.checkout_address2|raw }}">
                                            </li>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5 form-group">
                                            <li class="fc_shipto_{{ multiship.number }}_city">
<!--                                                 <label class="fc_pre" for="shipto_{{ multiship.number }}_city">{{ lang.checkout_city|raw }}<span class="fc_ast">*</span></label>
 -->                                                <input type="text" value="{{ multiship.city }}" class="form-control fc_text_long fc_required" id="shipto_{{ multiship.number }}_city" name="shipto_{{ multiship.number }}_city" autocomplete="section-{{ multiship.number }} shipping locality" placeholder="{{ lang.checkout_city|raw }}">
                                                <label style="display:none;" class="fc_error" for="shipto_{{ multiship.number }}_city">{{ lang.checkout_error_city|raw }}</label>
                                            </li>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <li class="fc_row_select fc_foxycomplete fc_shipto_{{ multiship.number }}_state_name">
<!--                                                 <label class="fc_pre" for="shipto_{{ multiship.number }}_state_name">{{ lang.checkout_state|raw }}<span class="fc_ast">*</span></label>
 -->                                                 <select class="form-control fc_text_long fc_required" data-default-value="{{ multiship.region_name }}" id="shipto_{{ multiship.number }}_state_name" name="shipto_{{ multiship.number }}_state_name"> 
                                                    <option value="" selected="selected">Select a State</option> 
                                                    <option value="AL">Alabama</option> 
                                                    <option value="AK">Alaska</option> 
                                                    <option value="AZ">Arizona</option> 
                                                    <option value="AR">Arkansas</option> 
                                                    <option value="CA">California</option> 
                                                    <option value="CO">Colorado</option> 
                                                    <option value="CT">Connecticut</option> 
                                                    <option value="DE">Delaware</option> 
                                                    <option value="DC">District Of Columbia</option> 
                                                    <option value="FL">Florida</option> 
                                                    <option value="GA">Georgia</option> 
                                                    <option value="ID">Idaho</option> 
                                                    <option value="IL">Illinois</option> 
                                                    <option value="IN">Indiana</option> 
                                                    <option value="IA">Iowa</option> 
                                                    <option value="KS">Kansas</option> 
                                                    <option value="KY">Kentucky</option> 
                                                    <option value="LA">Louisiana</option> 
                                                    <option value="ME">Maine</option> 
                                                    <option value="MD">Maryland</option> 
                                                    <option value="MA">Massachusetts</option> 
                                                    <option value="MI">Michigan</option> 
                                                    <option value="MN">Minnesota</option> 
                                                    <option value="MS">Mississippi</option> 
                                                    <option value="MO">Missouri</option> 
                                                    <option value="MT">Montana</option> 
                                                    <option value="NE">Nebraska</option> 
                                                    <option value="NV">Nevada</option> 
                                                    <option value="NH">New Hampshire</option> 
                                                    <option value="NJ">New Jersey</option> 
                                                    <option value="NM">New Mexico</option> 
                                                    <option value="NY">New York</option> 
                                                    <option value="NC">North Carolina</option> 
                                                    <option value="ND">North Dakota</option> 
                                                    <option value="OH">Ohio</option> 
                                                    <option value="OK">Oklahoma</option> 
                                                    <option value="OR">Oregon</option> 
                                                    <option value="PA">Pennsylvania</option> 
                                                    <option value="RI">Rhode Island</option> 
                                                    <option value="SC">South Carolina</option> 
                                                    <option value="SD">South Dakota</option> 
                                                    <option value="TN">Tennessee</option> 
                                                    <option value="TX">Texas</option> 
                                                    <option value="UT">Utah</option> 
                                                    <option value="VT">Vermont</option> 
                                                    <option value="VA">Virginia</option> 
                                                    <option value="WA">Washington</option> 
                                                    <option value="WV">West Virginia</option> 
                                                    <option value="WI">Wisconsin</option> 
                                                    <option value="WY">Wyoming</option>
                                                </select>
                                                <label style="display:none;" class="fc_error" for="shipto_{{ multiship.number }}_state_name">{{ lang.checkout_error_state|raw }}</label>
                                            </li>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <li class="fc_shipto_{{ multiship.number }}_postal_code">
<!--                                                 <label class="fc_pre" for="shipto_{{ multiship.number }}_postal_code">{{ lang.checkout_postal_code|raw }}<span class="fc_ast">*</span></label>
 -->                                                <input type="text" value="{{ multiship.postal_code }}" class="form-control fc_text_short fc_required" id="shipto_{{ multiship.number }}_postal_code" name="shipto_{{ multiship.number }}_postal_code" autocomplete="section-{{ multiship.number }} shipping postal-code" placeholder="{{ lang.checkout_postal_code|raw }}">
                                                <label style="display:none;" class="fc_error" for="shipto_{{ multiship.number }}_postal_code">{{ lang.checkout_error_postal_code|raw }}</label>
                                                <label style="display:none;" class="fc_error fc_error_invalid_postal_code" for="shipto_{{ multiship.number }}_postal_code">{{ lang.checkout_error_invalid_postal_code|raw }}</label>
                                            </li>
                                        </div>
                                    </div>
                                </ol>
                         <ol{% if multiship_data|length == 1 %} style="display:none;"{% endif %} class="fc_shipto_subtotal">
                                    <li class="row fc_shipto_{{ multiship.number }}_subtotal">
                                        <label class="fc_pre" for="shipto_{{ multiship.number }}_subtotal">{{ lang.checkout_shipment_subtotal|raw }}</label>
                                        <span id="shipto_{{ multiship.number }}_subtotal_formatted">{{ multiship.checkout_sub_total|money_format }}</span>
                                        <input type="hidden" value="{{ multiship.checkout_sub_total }}" id="shipto_{{ multiship.number }}_subtotal" name="shipto_{{ multiship.number }}_subtotal" />
                                    </li>
                                {% if multiship.has_shipping_or_handling_cost %}
                                    <li class="row fc_shipto_{{ multiship.number }}_shipping_total">
                                        <label class="fc_pre" for="shipto_{{ multiship.number }}_shipping_total">{{ multiship.shipping_and_handling_label|raw }}</label>
                                        <span id="shipto_{{ multiship.number }}_shipping_total_formatted">{{ multiship.shipping_total|money_format }}</span>
                                        <input type="hidden" value="{{ multiship.shipping_total }}" class="fc_shipping" id="shipto_{{ multiship.number }}_shipping_total" name="shipto_{{ multiship.number }}_shipping_total" />
                                    </li>
                                {% else %}
                                    <input type="hidden" name="shipto_{{ multiship.number }}_shipping_total" id="shipto_{{ multiship.number }}_shipping_total" class="fc_shipping" value="0" />
                                {% endif %}
                                    <li class="row fc_shipto_{{ multiship.number }}_tax_total">
                                        <label class="fc_pre" for="shipto_{{ multiship.number }}_tax_total">{{ lang.checkout_shipment_tax|raw }}</label>
                                        <span id="shipto_{{ multiship.number }}_tax_total_formatted">{{ multiship.checkout_tax_total|money_format }}</span>
                                        <input type="hidden" value="{{ multiship.checkout_tax_total }}" class="fc_taxes" id="shipto_{{ multiship.number }}_tax_total" name="shipto_{{ multiship.number }}_tax_total" />
                                    </li>
                                    <li class="row fc_shipto_{{ multiship.number }}_total">
                                        <label class="fc_pre" for="shipto_{{ multiship.number }}_total">{{ lang.checkout_shipment_total|raw }}</label>
                                        <span id="shipto_{{ multiship.number }}_total_formatted">{{ multiship.total|money_format }}</span>
                                        <input type="hidden" value="{{ multiship.total }}" id="shipto_{{ multiship.number }}_total" name="shipto_{{ multiship.number }}_total">
                                    </li>
                                </ol>


                                <legend>Gift Options</legend>

                                <fieldset class="form-group">
                                    <div class="radio gift-toggle">
                                    <label>
                                      <input type="radio" name="Is_this_a_gift" id="1" value="Nope it is for me" tabindex=400 data-toggle="radio" checked>
                                      <p>This is for me</p>
                                    </label>
                                </div>
                                    <div class="radio gift-toggle">        
                                <label>
                                      <input type="radio" name="Is_this_a_gift" data-toggle="radio" id="2" value="2">
                                      <p>This is a gift</p>
                                    </label>
                                </div>
                                </fieldset>
                                  <div class="fc_inner" id="gift_fields" style="display: none;">
                                    <ol>
                                        <div class="row">
                                              <div class="form-group col-sm-7">
                                                <li>
                                                  <input type="text" class="form-control" name="Recipients Email" id="recipients_email" placeholder="Recipients Email">
                                                </li>
                                            </div>

                                            <div class="form-group col-sm-5">
                                                <li>
                                                 <select class="form-control" name="Occasion" id="occasion">
                                                    <option value="" selected="selected">Select an Occasion</option> 
                                                    <option value="Birthday">Birthday</option>
                                                    <option value="Thank You">Thank You</option>
                                                    <option value="Anniversary">Anniversary</option>
                                                    <option value="Graduation">Graduation</option>
                                                    <option value="Congratulations">Congratulations</option>
                                                    <option value="Workplace">Workplace</option>
                                                    <option value="Get Well">Get Well</option>
                                                    <option value="Good Luck">Good Luck</option>
                                                    <option value="Other">Other</option>
                                                  </select>
                                              </li>
                                            </div>

                                        </div>

                                          
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <li>
                                              <textarea rows="3" placeholder="Message for Recipient" name="Gift Message" id="gift_message" class="col-xs-12 form-control"></textarea>
                                                </li>
                                            </div>
                                        </div>   
                                    </ol>
                                </div>
                                ^^multiship_custom_fields_{{ multiship.number }}^^
                                {% if multiship.has_live_rate_shippable_products %}
                                    <div class="row fc_shipping_methods_container">
                                        <label for="fc_shipto_{{ multiship.number }}_shipping_methods" class="fc_pre fc_shipping_methods">{{ lang.checkout_shipping_methods|raw }}</label>
                                        <div id="fc_shipto_{{ multiship.number }}_shipping_methods" class="fc_radio_group_container row fc_shipping_methods">
                                            <div id="fc_shipto_{{ multiship.number }}_shipping_result" class="fc_shipping_result">{{ lang.checkout_update_shipping_message|raw }}</div>
                                            <span id="shipto_{{ multiship.number }}_shipping_ajax" class="fc_shipping_ajax" style="display:none">{{ lang.checkout_updating_shipping_options|raw }}<img src="//cdn.foxycart.com/static{{ base_directory }}/images/ajax-loader.gif?ver=1" alt="{{ lang.checkout_loading|raw }}" /></span>
                                            <textarea rows="1" cols="1" name="shipto_{{ multiship.number }}_shipping_options" id="shipto_{{ multiship.number }}_shipping_options" style="display:none;">{{ multiship.shipping_options }}</textarea>
                                            <input type="hidden" name="shipto_{{ multiship.number }}_shipping_service_id" id="shipto_{{ multiship.number }}_shipping_service_id" value="{{ multiship.shipping_service_id }}" />
                                            <input type="hidden" name="shipto_{{ multiship.number }}_shipping_service_description" id="shipto_{{ multiship.number }}_shipping_service_description" value="{{ multiship.shipping_service_description }}" />
                                            <div id="fc_shipto_{{ multiship.number }}_shipping_methods_inner" class="fc_shipping_methods_inner">
                                            {{ multiship.shipping_options_html|raw }}
                                            </div>
                                            <label for="fc_shipto_{{ multiship.number }}_shipping_methods" class="fc_error" style="display:none">{{ lang.checkout_select_shipping_option|raw }}</label>
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
                                <span class="fc_clear">&nbsp;</span>
                            </div><!-- .fc_inner -->
                            <div class="fc_shipto_actions">
                                <a class="fc_shipto_shipto_set" id="fc_shipto_{{ multiship.number }}_shipto_set" href="javascript:;">{{ lang.checkout_confirm_address|raw }}</a>
                                <a class="fc_shipto_shipto_edit" id="fc_shipto_{{ multiship.number }}_shipto_edit" href="javascript:;">{{ lang.checkout_edit_address|raw }}</a>
                            </div>
                        </fieldset><!-- #fc_shipto_{{ multiship.number }} -->
                    <span class="fc_clear">&nbsp;</span>
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
            <div id="fc_shipping_container" class="hide"{% if is_updateinfo %} style="display:none;"{% endif %}>
                <fieldset id="fc_shipping">
                    <legend>{{ lang.checkout_delivery_and_subtotal|raw }}</legend>
                    <div class="fc_inner">
                    {% if has_live_rate_shippable_products and not has_multiship %}
                        <div id="fc_shipping_methods_container" class="row fc_shipping_methods_container">
                            <label for="fc_shipping_methods" class="fc_pre fc_shipping_methods">{{ lang.checkout_shipping_methods|raw }}</label>
                            <div id="fc_shipping_methods" class="fc_radio_group_container row fc_shipping_methods">
                                <div id="fc_shipping_result" class="fc_shipping_result">{{ lang.checkout_update_shipping_message|raw }}</div>
                                <span id="shipping_ajax" class="fc_shipping_ajax" style="display:none">{{ lang.checkout_updating_shipping_options|raw }}<img src="//cdn.foxycart.com/static{{ base_directory }}/images/ajax-loader.gif?ver=1" alt="{{ lang.checkout_loading|raw }}" /></span>
                                <textarea rows="1" cols="1" name="shipping_options" id="shipping_options" style="display:none;">{{ shipping_options }}</textarea>
                                <input type="hidden" name="shipping_service_id" id="shipping_service_id" value="{{ shipping_service_id }}" />
                                <input type="hidden" name="shipping_service_description" id="shipping_service_description" value="{{ shipping_service_description }}" />
                                <div id="fc_shipping_methods_inner" class="fc_shipping_methods_inner">
                                    {{ shipping_options_html|raw }}
                                </div>
                                <label for="fc_shipping_methods" class="fc_error" style="display:none">{{ lang.checkout_select_shipping_option|raw }}</label>
                            </div>
                        </div>
                    {% endif %}
                    {% if has_downloadables %}
                        <div class="fc_downloadable_message_container">
                            <p class="fc_downloadable_message">{{ lang.checkout_downloadables_message|raw }}</p>
                        </div>
                    {% endif %}
                        <ol id="fc_shipping_list">
                            <li class="row fc_subtotal">
                                <label for="subtotal" class="fc_pre">{{ lang.checkout_cart_subtotal|raw }}</label>
                                <span id="subtotal_formatted" class="amount">{{ checkout_subtotal|money_format }}</span>
                                <input value="{{ checkout_subtotal }}" type="hidden" name="subtotal" id="subtotal" />
                            </li>
                        {% if has_future_products %}
                            <li class="row fc_future_subscriptions">
                                <label for="future_subscriptions" class="fc_pre">{{ lang.cart_future_subscriptions|raw }}</label>
                                <span id="future_subscriptions_formatted" class="amount">{{ checkout_future_subscriptions|money_format }}</span>
                                <input value="{{ checkout_future_subscriptions }}" type="hidden" name="future_subscriptions" id="future_subscriptions" />
                            </li>
                        {% endif %}
                    {% if has_shipping_or_handling_cost %}
                            <li class="row fc_shipping_cost">
                                <label for="shipping_cost" class="fc_pre">{{ shipping_and_handling_label|raw }}</label>
                                <span id="shipping_cost_formatted" class="amount">{{ checkout_shipping_cost|money_format }}</span>
                                <input value="{{ checkout_shipping_cost }}" type="hidden" name="shipping_cost" id="shipping_cost" />
                            </li>
                        {% if has_future_products %}
                            <li class="row fc_future_shipping_cost"{% if not has_future_shipping_and_handling %} style="display:none;"{% endif %}>
                                <label for="future_shipping_cost" class="fc_pre">{{ lang.cart_future_subscriptions|raw }} {{ shipping_and_handling_label|raw }}</label>
                                <span id="future_shipping_cost_formatted" class="amount">{{ checkout_future_shipping_cost|money_format }}</span>
                                <input value="{{ checkout_future_shipping_cost }}" type="hidden" name="future_shipping_cost" id="future_shipping_cost" />
                            </li>
                        {% endif %}
                    {% endif %}
                        {% if has_discount %}
                            <li class="row fc_discount">
                                <label for="discount" class="fc_pre">{{ lang.checkout_discount|raw }}</label>
                                <span id="discount_formatted" class="amount">{{ checkout_discount|money_format }}</span>
                                <input value="{{ checkout_discount }}" type="hidden" name="discount" id="discount" />
                            </li>
                        {% endif %}
                            <li class="row fc_tax">
                                <label for="tax" class="fc_pre">{{ lang.checkout_tax|raw }}</label>
                                <span id="tax_formatted" class="amount">{{ checkout_tax|money_format }}</span>
                                <input value="{{ checkout_tax }}" type="hidden" name="tax" id="tax" />
                            </li>
                            <li class="row fc_order_total">
                                <label for="order_total" class="fc_pre">{{ lang.checkout_order_total|raw }}</label>
                                <span id="order_total_formatted" class="amount">{{ checkout_order_total|money_format }}</span>
                                <input value="{{ checkout_order_total }}" type="hidden" name="order_total" id="order_total" />
                            </li>
                        </ol>
                        <span class="fc_clear">&nbsp;</span>
                    </div><!-- .fc_inner -->
                </fieldset><!-- #fc_shipping -->
                <span class="fc_clear">&nbsp;</span>
            </div><!-- #fc_shipping_container -->
        {% endblock checkout_shipping_and_summary %}



        {% block checkout_payment %}
            <!--  *********** payment : Payment Information ************* -->
            <div id="fc_payment_container" class="form-group ">
                <fieldset id="fc_payment">
                    <legend>{{ lang.checkout_payment_information|raw }}</legend>
                    <div class="fc_inner">
                        <ol id="fc_payment_list">
                        {% if supports_pay_with_plastic %}
                            <li id="fc_payment_method_plastic_container" class="row fc_row_payment_method">
                                <label for="fc_payment_method_plastic" class="fc_radio">
                                    <input type="{{ payment_method_input_type }}"{% if payment_method_type == 'plastic' %} checked="checked"{% endif %} name="fc_payment_method" id="fc_payment_method_plastic" class="fc_radio" value="plastic" autocomplete="off" />
                                    <span>{{ lang.checkout_pay_with_credit_card|raw }}</span>
                                </label>
                                <span class="fc_clear">&nbsp;</span>
                                <small class="text-center">Your payment is secure with us.  We use <a href="http://www.foxycart.com/features/feature/security" target="_blank">Foxycart</a> to ensure that all information is encrypet at all times</small>
                            {% if has_multiple_payment_options %}
                                <fieldset>
                                    <ol>
                            {% else %}
                                </li>
                            {% endif %}{# has_multiple_payment_options #}
                                        <li id="li_cc_saved" class="row fc_row_radio">
                                            <label for="c_card_saved" class="fc_radio">
                                                <input{% if cc_card_is_saved %} checked="checked"{% endif %} type="radio" name="c_card" value="saved" id="c_card_saved" class="fc_radio" onclick="FC.checkout.displayNewCC(0)" autocomplete="off" />
                                                <span>{{ lang.checkout_use_saved_payment_info|raw }}</span>
                                                <span id="fc_c_card_saved_number">{{ checkout_cc_number_masked }}</span>
                                            </label>
                                        </li>
                                        <li id="li_cc_new" class="row fc_row_radio">
                                            <label for="c_card_new" class="fc_radio">
                                                <input{% if not cc_card_is_saved %} checked="checked"{% endif %} type="radio" name="c_card" value="new" id="c_card_new" class="fc_radio" onclick="FC.checkout.displayNewCC(1)" autocomplete="off" />
                                                <span>{{ lang.checkout_enter_new_card|raw }}</span>
                                            </label>
                                        </li>
                                        <div class="row">
                                            <div class="col-sm-9 li_shipto_0_select">
                                                <li id="li_cc_number" class="li_cc_number">
<!--                                                     <label for="cc_number" class="fc_pre">{{ lang.checkout_card_number|raw }}</label>
 -->                                                    <input type="text" name="cc_number" id="cc_number" class="form-control fc_text_long fc_required" autocomplete="off" value="{{ cc_number }}" placeholder="{{ lang.checkout_card_number|raw }}"/>
                                                    <label for="cc_number" class="fc_error" style="display:none">{{ lang.checkout_error_card_number|raw }}</label>
                                                </li>
                                            </div>
                                            <div class="col-sm-3 li_shipto_0_select">
                                                <li id="li_cc_cvv2" class="li_cc_cvv2">
                                                      <input value="{{ cc_cvv2 }}" type="text" name="cc_cvv2" id="cc_cvv2" autocomplete="off" class="form-control fc_text_short fc_required" maxlength="4" placeholder="{{ lang.checkout_verification_code|raw }}"/>
                                                    <label for="cc_cvv2" class="fc_error" style="display:none">{{ lang.checkout_error_verification_code|raw }}</label>
                                                </li>
                                            </div>

                                            <div class="col-sm-3 li_shipto_0_select">
                                                <li id="li_cc_issue_number">

                                                    <label for="cc_issue_number" class="fc_pre">
                                                        <!-- {{ lang.checkout_issue_number|raw }} -->
                                                    </label>
                                                    <input value="{{ cc_issue_number }}" type="text" name="cc_issue_number" id="cc_issue_number" class="form-control fc_text_short fc_required" maxlength="2" placeholder="{{ lang.checkout_issue_number|raw }}"/>
                                                    <label for="cc_issue_number" class="fc_error" style="display:none">{{ lang.checkout_error_issue_number|raw }}</label>
                                                </li>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <li id="li_cc_start_date_month">
<!--                                                     <label for="cc_start_date_month" class="fc_pre">{{ lang.checkout_start_date|raw }}</label>
 -->                                                    <select id="cc_start_date_month" name="cc_start_date_month" class="select_mo form-control">
                                                        <option value="">{{ lang.cart_month|raw }}</option>
                                                        {{ cc_start_date_month_options|raw }}
                                                    </select>
                                                    <select id="cc_start_date_year" name="cc_start_date_year" class="select_yr form-control">
                                                        <option value="">{{ lang.cart_year|raw }}</option>
                                                        {{ cc_start_date_year_options|raw }}
                                                    </select>
                                                    <label for="cc_start_date_month" class="fc_error" style="display:none">{{ lang.checkout_error_start_date|raw }}</label>
                                                </li>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-sm-4">                                                
                                                <li id="li_cc_exp_month">
<!--                                                     <label for="cc_exp_month" class="fc_pre">{{ lang.checkout_expiration|raw }}</label>
 -->                                                    <select id="cc_exp_month" name="cc_exp_month" class="inline select_mo form-control">
                                                        <option value="">{{ lang.cart_month|raw }}</option>
                                                        {{ cc_expiration_month_options|raw }}
                                                    </select>
                                                    <select id="cc_exp_year" name="cc_exp_year" class="select_yr form-control">
                                                        <option value="">{{ lang.cart_year|raw }}</option>
                                                        {{ cc_expiration_year_options|raw }}
                                                    </select>
                                                    <label for="cc_exp_month" class="fc_error" style="display:none">{{ lang.checkout_error_expiration|raw }}</label>
                                                </li>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 checkbox">                                                
                                                <li id="li_save_cc" class="row fc_row_checkbox">
                                                    <label for="save_cc" class="fc_checkbox">
                                                        <input{% if save_cc_is_checked %} checked="checked"{% endif %} type="checkbox" name="save_cc" id="save_cc" value="1"/>
                                                        {{ save_cc_text }}
                                                    </label>
                                                    <label for="save_cc" class="fc_error" style="display:none">{{ lang.checkout_error_subscription_permission|raw }}</label>
                                                    <input type="hidden" name="cc_number_masked" id="cc_number_masked" value="{{ checkout_cc_number_masked }}" />
                                                </li>
                                            </div>
                                        </div>
                            {% if has_multiple_payment_options %}
                                    </ol>
                                </fieldset>
                            </li>
                            {% endif %}{# has_multiple_payment_options #}
                        {% endif %}{# supports_pay_with_plastic #}

                        {% if supports_paypal_express and not is_updateinfo %}
                            <li id="fc_payment_method_paypal_container" class="row fc_row_payment_method">
                            {% if has_multiple_payment_options %}
                                <label for="fc_payment_method_paypal" class="fc_radio">
                                    <input type="{{ payment_method_input_type }}"{% if payment_method_type == 'paypal' %} checked="checked"{% endif %} name="fc_payment_method" id="fc_payment_method_paypal" class="fc_radio" value="paypal" autocomplete="off" />
                                    <span>{{ lang.checkout_pay_with_paypal|raw }}</span>
                                </label>
                            {% else %}
                                <input type="hidden" name="fc_payment_method" id="fc_payment_method" value="paypal" />
                                <span>{{ lang.checkout_pay_with_paypal|raw }}</span>
                            {% endif %}
                                <fieldset>
                                    <p>{{ paypal_description|raw }}</p>
                                </fieldset>
                            </li>
                        {% endif %}{# supports_paypal_express and not is_updateinfo #}

                        {% if not is_updateinfo %}
                        {% for hosted_gateway in hosted_payment_gateways %}
                            <li id="fc_payment_method_{{ hosted_gateway.type }}_container" class="row fc_row_payment_method fc_row_hosted_payment_method">
                            {% if has_multiple_payment_options %}
                                <label class="fc_radio">
                                    <input type="{{ payment_method_input_type }}"{% if payment_method_type == hosted_gateway.type %} checked="checked"{% endif %} name="fc_payment_method" id="fc_payment_method_{{ hosted_gateway.type }}" class="fc_radio" value="{{ hosted_gateway.type }}" autocomplete="off" />
                                    <span>{{ hosted_gateway.lang_pay_with|raw }}</span>
                                </label>
                            {% else %}
                                <input type="hidden" name="fc_payment_method" id="fc_payment_method_{{ hosted_gateway.type }}" value="{{ hosted_gateway.type }}" />
                                <span>{{ hosted_gateway.lang_pay_with|raw }}</span>
                            {% endif %}
                                <fieldset>
                                    <p>{{ hosted_gateway.lang_payment_method|raw }}</p>
                                </fieldset>
                            </li>
                        {% endfor %}
                        {% endif %}{# not is_updateinfo #}

                        {% if supports_purchase_order and not is_updateinfo %}
                            <li id="fc_payment_method_purchase_order_container" class="row fc_row_payment_method">
                                <label for="fc_payment_method_purchase_order" class="fc_radio">
                                    <input type="{{ payment_method_input_type }}"{% if payment_method_type == 'purchase_order' %} checked="checked"{% endif %} name="fc_payment_method" id="fc_payment_method_purchase_order" class="fc_radio" value="purchase_order" autocomplete="off" />
                                    <span>{{ lang.checkout_pay_with_purchase_order|raw }}</span>
                                </label>
                            {% if has_multiple_payment_options %}
                                <fieldset>
                                    <ol>
                            {% else %}
                            </li>
                            {% endif %}{# has_multiple_payment_options #}
                                        <li id="li_purchase_order" class="row li_purchase_order">
                                            <label for="purchase_order" class="fc_pre">
                                                {{ lang.checkout_purchase_order_number|raw }}
                                            </label>
                                            <input value="{{ purchase_order }}" type="text" name="purchase_order" id="purchase_order" class="form-control fc_required" />
                                            <label for="purchase_order" class="fc_error" style="display:none">{{ lang.checkout_error_purchase_order|raw }}</label>
                                        </li>
                            {% if has_multiple_payment_options %}
                                    </ol>
                                </fieldset>
                            </li>
                            {% endif %}{# has_multiple_payment_options #}
                        {% endif %}{# supports_purchase_order and not is_updateinfo #}

                            <li id="li_nopayment" class="row">
                                {# This is used for $0 transactions and other situations where no payment info is collected #}
                                {{ lang.checkout_no_payment_needed|raw }}
                            </li>
                        </ol>

                        <div id="fc_complete_order_button_container" class="row fc_row_actions center">
                            <button id="fc_complete_order_button" class="fc_button{{ submit_button_class }} btn btn-primary btn-lg fc_button" type="button" value="{{ submit_button_value }}" onclick="FC.checkout.validateAndSubmit()">{{ submit_button_value }}</button>
                            <div id="fc_complete_order_processing" style="display:none;"><strong class="fc_error"></strong> <br /><img src="//cdn.foxycart.com/static{{ base_directory }}/images/ajax-loader.gif?ver=1" alt="{{ lang.checkout_loading|raw }}" width="220" height="19" /></div>
                        </div><!-- #fc_complete_order_button_container -->

                        <span class="fc_clear">&nbsp;</span>
                    </div><!-- .fc_inner -->
                </fieldset><!-- #fc_payment -->
                <span class="fc_clear">&nbsp;</span>
            </div><!-- #fc_payment_container -->
        {% endblock checkout_payment %}

    </div>

    </div><!-- #fc_data_entry_container -->



    {% else %} {# is_subscription_cancel #}



        {% block subscription_cancel %}
        <div id="fc_subscription_cancel_message">
            {{ lang.checkout_subscription_cancel_message|raw }}
        </div><!-- #fc_subscription_cancel_message -->

        <div id="fc_complete_order_button_container" class="row center fc_row_actions">
            <button id="fc_complete_order_button" class="fc_button{{ submit_button_class }}" type="button" value="{{ submit_button_value }}" onclick="FC.checkout.validateAndSubmit()">{{ submit_button_value }}</button>
            <div id="fc_complete_order_processing" style="display:none;"><strong class="fc_error"></strong> <br /><img src="//cdn.foxycart.com/static{{ base_directory }}/images/ajax-loader.gif?ver=1" alt="{{ lang.checkout_loading|raw }}" width="220" height="19" /></div>
        </div><!-- #fc_complete_order_button_container -->
        {% endblock subscription_cancel %}



    {% endif %}{# not is_subscription_cancel #}



</form>
<span class="fc_clear">&nbsp;</span>
</div><!-- #fc_checkout_container -->



<!-- ###########################################################################
    END checkout
    ########################################################################### -->
{# END CHECKOUT TWIG TEMPLATE #}



{% endblock checkout %}

<div class="col-md-4 col-sm-offset-1 shaded-form">

    {# BEGIN CART TWIG TEMPLATE #}

    {% block cart %}

    {% block cart_begin %}

    {% if not for_email %}
    <!-- begin cart output -->
    <div id="fc_cart_container"><div id="fc_cart_container_inner">
    {% endif %}
    {% if with_controls %}
    <noscript>
        <div id="fc_error_noscript" class="fc_error">
            <h3>{{ lang.cart_warning|raw }}:</h3>
            <p>{{ lang.cart_no_javascript_message|raw }}</p>
        </div><!-- #fc_errorNoScript -->
    </noscript>
    <form id="fc_cart_form" action="https://{{ store_domain }}{{ post_url }}" method="post">
        <div id="fc_cart_controls_top" class="fc_cart_controls">
        {% block cart_controls %}
            <input type="hidden" name="cart" value="update" />
            <input type="hidden" name="item_count" value="{{ items|length }}" />
            <input type="hidden" name="{{ session_name }}" value="{{ session_id }}" />
        {% if supports_paypal_express or show_amazon_fps_button %}
            <a class="fc_link_nav fc_cart_update fc_cart_update_paypal" href="#" onclick="fc_UpdateCart();return false;">{{ lang.cart_update_cart|raw }}</a>
        {% else %}
            <a class="fc_link_nav fc_cart_update" href="#" onclick="fc_UpdateCart();return false;">{{ lang.cart_update_cart|raw }}</a>
        {% endif %}
        {% if items|length > 0 %}
            {% if supports_paypal_express and show_amazon_fps_button %}
            <div class="fc_cart_alternate_payments">
            {% endif %}
            {% if supports_paypal_express %}
            <a class="fc_link_nav fc_link_forward fc_cart_checkout_paypal" href="https://{{ store_domain }}/checkout.php?ThisAction=paypal_express&{{ session_name }}={{ session_id }}" target="_top">
                <img src="{{ paypal_checkout_button_url }}" />
            </a>
            {% endif %}
            {% if show_amazon_fps_button %}
            <a class="fc_link_nav fc_link_forward fc_cart_checkout_paypal fc_cart_checkout_amazon" href="https://{{ store_domain }}/checkout.php?ThisAction=checkout&fc_payment_method=amazon_fps" target="_top">
                <img src="https://cdn.foxycart.com/static/images/payment_logos/amazon.png" />
            </a>
            {% endif %}
            {% if supports_paypal_express and show_amazon_fps_button %}
            </div>
            {% endif %}
            {% if supports_paypal_express or show_amazon_fps_button %}
            <span class="fc_cart_checkout_or">-OR-</span>
            {% endif %}
            <a class="fc_link_nav fc_link_forward fc_cart_checkout" href="https://{{ store_domain }}/checkout.php?{{ session_name }}={{ session_id }}" target="_top">{{ lang.cart_checkout|raw }}</a>
        {% endif %}
        {% endblock cart_controls %}
        </div><!-- #fc_cart_controls_top -->
    {% endif %}
    {% if with_controls %}
        {{ html_messages|raw }}
    {% endif %}
    {% if for_email %}
        <table id="fc_cart_table" width="100%" style="font-size:12px; text-align:left;" cellspacing="0" cellpadding="5">
    {% else %}
        <table id="fc_cart_table" cellspacing="0" cellpadding="0">
    {% endif %}
            <legend>{{ lang.cart_caption|raw }}</legend>

    {% endblock cart_begin %}

    {% block header %}

    {% if not for_email %}
            <thead>
    {% endif %}
                <tr id="fc_cart_head">
                {% if has_product_images %}
                    <th{{ css_styles.background }} id="fc_cart_head_image"><span>{{ lang.cart_image|raw }}</span></th>
                {% endif %}
                    <th{{ css_styles.background }} id="fc_cart_head_item"><span>{{ lang.cart_item|raw }}</span></th>
                    <th{{ css_styles.background }} id="fc_cart_head_quantity"></th>
                    <th{{ css_styles.background }} id="fc_cart_head_price"></th>
                </tr>
    {% if not for_email %}
            </thead>
    {% endif %}

    {% endblock header %}

    {% block footer %}

        {% if not for_email %}
            <tfoot>
        {% endif %}
                <tr id="fc_cart_foot_subtotal">
                    <td{{ css_styles.border2_right }} class="fc_col1" colspan="{{ colspan-1 }}" >{{ lang.cart_subtotal|raw }}:</td>
                    <td{{ css_styles.border2 }} class="fc_col2">{{ cart_sub_total }}</td>
                </tr>
            {% if has_future_products %}
                <tr id="fc_cart_foot_subscriptions">
                    <td class="fc_col1" colspan="{{ colspan-1 }}">{{ lang.cart_future_subscriptions|raw }}:</td>
                    <td{{ css_styles.right }} class="fc_col2">{{ future_total_price }}</td>
                </tr>
            {% endif %}
        {% for coupon in coupons %}
            {% if not coupon.is_applied %}
                <tr class="fc_cart_foot_discount fc_coupon_unapplied">
            {% else %}
                <tr class="fc_cart_foot_discount">
            {% endif %}
                    <td{{ css_styles.right }} class="fc_col1" colspan="{{ colspan-1 }}">
                        {{ coupon.name }}: {{ coupon.code }}
                    </td>
                    <td class="fc_col2">
                        <span class="fc_discount">{{ coupon.amount }}</span>
                    {% if with_controls %}
                        <span class="fc_cart_coupon_remove">
                            <a href="https://{{ store_domain }}{{ post_url }}?cart=remove_coupon&amp;coupon_code_id={{ coupon.id }}&amp;{{ session_name }}={{ session_id }}" class="fc_cart_remove_link" title="{{ lang.cart_remove_coupon|raw }}">[x]</a>
                        </span>
                    {% endif %}
                    </td>
                </tr>
        {% endfor %}
        {% for coupon in future_coupons %}
            <tr class="fc_cart_foot_discount fc_future">
                <td{{ css_styles.right }} class="fc_col1" colspan="{{ colspan-1 }}">
                    {{ lang.cart_future_subscriptions|raw }} {{ coupon.name }}: {{ coupon.code }}
                </td>
                <td class="fc_col2">
                    <span class="fc_discount">{{ coupon.amount }}</span>
                </td>
            </tr>
        {% endfor %}

            {% if with_controls and has_eligible_coupons %}
                <tr id="fc_cart_foot_discount_new">
                    <td{{ css_styles.right }} class="fc_col1" colspan="{{ colspan-1 }}">
                        <a href="#" onclick="fc_AddCoupon(); this.blur(); return false;">{{ lang.cart_add_coupon|raw }}</a>
                    </td>
                    <td class="fc_col2">
                        <input type="text" name="coupon" id="fc_coupon" class="fc_text fc_text_short" value="" style="display:none;" />
                    </td>
                </tr>
            {% endif %}
    {% if not with_controls %}
            {% if show_shipping_tbd %}
                <tr id="fc_cart_foot_shipping_tbd">
                    <td{{ css_styles.right }} class="fc_col1" colspan="{{ colspan-1 }}">{{ shipping_and_handling_label|raw }}:</td>
                    <td class="fc_col2">{{ lang.checkout_tbd|raw }}</td>
                </tr>
            {% endif %}
            {% if show_shipping_tbd and hide_shipping_row %}
                <tr id="fc_cart_foot_shipping" style="display: none;">
            {% else %}
                <tr id="fc_cart_foot_shipping">
            {% endif %}
                    <td{{ css_styles.right }} class="fc_col1" colspan="{{ colspan-1 }}">{{ shipping_and_handling_label|raw }}:</td>
                {% if show_shipping_tbd %}
                    <td class="fc_col2">{{ lang.checkout_tbd|raw }}</td>
                {% else %}
                    <td class="fc_col2">{{ cart_total_shipping }}</td>
                {% endif %}
                </tr>
        {% if has_future_products %}
            {% if show_future_shipping_and_handling %}
                <tr id="fc_cart_foot_future_shipping">
            {% else %}
                <tr id="fc_cart_foot_future_shipping" style="display: none;">
            {% endif %}
                    <td{{ css_styles.right }} class="fc_col1" colspan="{{ colspan-1 }}">{{ lang.cart_future_subscriptions|raw }} {{ shipping_and_handling_label|raw }}:</td>
                    <td class="fc_col2">{{ future_shipping_and_handling }}</td>
                </tr>
        {% endif %}
        {% if has_taxes %}
            {% for tax in taxes %}
                {% if tax.show_tax %}
                    <tr id="fc_cart_foot_tax_{{ tax.id }}" class="fc_cart_foot_tax">
                        <td{{ css_styles.right }} class="fc_col1" colspan="{{ colspan-1 }}">{{ tax.description|raw }}:</td>
                        <td class="fc_col2">{{ tax.amount }}</td>
                    </tr>
                {% else %}
                    {% if not for_email %}
                    <tr id="fc_cart_foot_tax_{{ tax.id }}" class="fc_cart_foot_tax" style="display: none;">
                        <td{{ css_styles.right }} class="fc_col1" colspan="{{ colspan-1 }}">{{ tax.description|raw }}:</td>
                        <td class="fc_col2">{{ tax.amount }}</td>
                    </tr>
                    {% endif %}
                {% endif %}
            {% endfor %}
            {% if show_tax_tbd %}
                {% if tax_total <= 0 %}
                    <tr id="fc_cart_foot_tax_tbd">
                {% else %}
                    <tr id="fc_cart_foot_tax_tbd" style="display: none;">
                {% endif %}
                        <td class="fc_col1" colspan="{{ colspan-1 }}">{{ lang.checkout_tax|raw }}:</td>
                        <td class="fc_col2">{{ lang.checkout_tbd|raw }}</td>
                    </tr>
            {% endif %}
        {% endif %}
    {% endif %}
                <tr id="fc_cart_foot_total">
                    <td class="fc_col1" colspan="{{ colspan-1 }}">{{ lang.cart_order_total|raw }}:</td>
                    <td class="fc_col2">{{ cart_order_total }}</td>
                </tr>
        {% if not for_email %}
            </tfoot>
        {% endif %}

    {% endblock footer %}

    {% block body %}

    {% if not has_multiship and not for_email %}
        <tbody>
    {% endif %}
    {% for item in items %}
            {% if item.multiship >= 0 %}
            {% if item.multiship > 0 and not for_email %}
            </tbody>
            {% endif %}
        {% if not for_email %}
            <tbody class="fc_ship_to">
        {% endif %}
                <tr>
                    <th id="fc_shipto_{{ item.multiship }}_cart_row" class="fc_shipto" colspan="{{ colspan }}">
                        {{ lang.cart_shipto|raw }}: {{ item.shipto }}
                    </th>
                </tr>
        {% endif %}
            {% if item.item_number == items|length %}
                <tr id="product_{{ item.id }}" class="fc_cart_item fc_cart_item_last">
            {% else %}
                <tr id="product_{{ item.id }}" class="fc_cart_item">
            {% endif %}
                {% if has_product_images %}
                    <td class="fc_cart_item_image"{{ css_styles.border }}>
                    {% if item.image != '' %}
                    {% if item.url != '' %}
                        <a href="{{ item.url }}" target="_top" alt="{{ item.alt_name }}">
                    {% endif %}
                        <img class="fc_cart_thumbnail" src="{{ item.image }}" />
                    {% if item.url != '' %}
                        </a>
                    {% endif %}
                    {% endif %}
                    </td>
                {% endif %}
                    <td class="fc_cart_item_details"{{ css_styles.border }}>
                        <span class="fc_cart_item_name">{{ item.name }}</span>
                    {% if item.options|length > 0 or item.code != '' or item.category_code != 'DEFAULT' or item.weight != 0 or item.subscription_frequency != '' %}
                        <ul class="fc_cart_item_options">
                        {% for option in item.options %}
                            <li class="fc_cart_item_option fc_cart_item_{{ option.class }}">
                                <span class="fc_cart_item_option_name">{{ option.name }}</span><span class="fc_cart_item_option_separator">:</span>
                                <span class="fc_cart_item_option_value">{{ option.value }}</span>
                            </li>
                        {% endfor %}
                        <!-- {% if item.code != '' %}
                            <li class="fc_cart_item_option fc_cart_item_code">
                            {{ lang.cart_code|raw }}: {{ item.code }}
                            </li>
                        {% endif %}
                        {% if item.category_code != 'DEFAULT' %}
                            <li class="fc_cart_item_option fc_cart_category_code">
                            {{ lang.cart_category|raw }}: {{ item.category_code }}
                            </li>
                        {% endif %} -->
                        {% if item.weight != 0 %}
                            <li class="fc_cart_item_option fc_cart_item_weight">
                            {{ lang.cart_weight|raw }}: {{ item.weight }} <span class="fc_uom_weight">{{ weight_uom }}</span>
                            </li>
                        {% endif %}
                        {% if item.subscription_frequency != '' %}
                            <!-- <li class="fc_cart_item_option fc_cart_item_subscription_details">
                                {{ lang.cart_subscription_details|raw }}
                                <ul>
                                    <li class="fc_cart_item_option fc_cart_item_sub_frequency">
                                        <span class="fc_cart_item_option_name">{{ lang.cart_frequency|raw }}</span><span class="fc_cart_item_option_separator">:</span> <span class="fc_cart_item_option_value">{{ item.subscription_frequency }}</span>
                                    </li>
                                    <li class="fc_cart_item_option fc_cart_item_sub_startdate">
                                        <span class="fc_cart_item_option_name">{{ lang.cart_start_date|raw }}</span><span class="fc_cart_item_option_separator">:</span> <span class="fc_cart_item_option_value">{{ item.subscription_start_date }}</span>
                                    </li>
                                    <li class="fc_cart_item_option fc_cart_item_sub_nextdate">
                                        <span class="fc_cart_item_option_name">{{ lang.cart_next_date|raw }}</span><span class="fc_cart_item_option_separator">:</span> <span class="fc_cart_item_option_value">{{ item.subscription_next_transaction_date }}</span>
                                    </li>
                                {% if item.subscription_end_date != "0000-00-00" %}
                                    <li class="fc_cart_item_option fc_cart_item_sub_enddate">
                                        <span class="fc_cart_item_option_name">{{ lang.cart_end_date|raw }}</span><span class="fc_cart_item_option_separator">:</span> <span class="fc_cart_item_option_value">{{ item.subscription_end_date }}</span>
                                    </li>
                                {% endif %}
                                </ul>
                            </li> -->
                        {% endif %}
                        </ul>
                    {% endif %}
                    {% if with_controls %}
                        <span class="fc_cart_remove_left">
                            <a href="#" onclick="fc_RemoveItem({{ item.item_number }}); return false;" class="fc_cart_remove_link" title="{{ lang.cart_remove_item|raw }}">[x]</a>
                        </span>
                        <input type="hidden" id="id{{ item.item_number }}" name="id{{ item.item_number }}" value="{{ item.id }}" />
                    {% endif %}
                    </td>
                    <td class="fc_cart_item_quantity"{{ css_styles.border }}>
                    {% if with_controls %}
                        <input class="fc_cart_item_quantity fc_text fc_text_short" type="text" id="quantity{{ item.item_number }}" name="quantity{{ item.item_number }}" value="{{ item.quantity }}" />
                        <span class="fc_cart_remove_center">
                            <a href="#" onclick="fc_RemoveItem({{ item.item_number }}); return false;" class="fc_cart_remove_link" title="{{ lang.cart_remove_item|raw }}">[x]</a>
                        </span>
                    {% else %}
                        
                    {% endif %}
                    </td>
                    <td class="fc_cart_item_price"{{ css_styles.border }}>
                        <span class="fc_cart_item_price_total"></span>
                        {% if item.quantity > 1 %}
                        <span class="fc_cart_item_price_each"></span>
                        {% endif %}
                    {% if with_controls %}
                        <span class="fc_cart_remove_right">
                            <a href="#" onclick="fc_RemoveItem({{ item.item_number }}); return false;" class="fc_cart_remove_link" title="{{ lang.cart_remove_item|raw }}">[x]</a>
                        </span>
                    {% endif %}
                    </td>
                </tr>
    {% endfor %}
        {% if not for_email %}
            </tbody>
        {% endif %}
    {% endblock body %}

    {% block cart_end %}

    {% if items|length == 0 %}
        {% if not for_email %}
            <tbody>
        {% endif %}
                <tr class="fc_cart_item">
                    <td colspan="{{ colspan }}" id="fc_empty_cart">{{ lang.cart_empty|raw }}</td>
                </tr>
        {% if not for_email %}
            </tbody>
        {% endif %}
    {% endif %}
        </table>
    {% if with_controls %}
        <div id="fc_cart_controls_bottom" class="fc_cart_controls">
        {{ block('cart_controls') }}
        </div><!-- #fc_cart_controls_bottom -->
    </form>
    {% endif %}
    {% if not for_email %}
    </div></div><!-- #fc_cart_container_inner, #fc_cart_container -->
    {% endif %}
    <!-- end cart output -->

    {% endblock cart_end %}

    {% endblock cart %}

    {# END CART TWIG TEMPLATE #}

      <hr class="featurette-divider">

            {% block continue_shopping %}
        <div id="fc_cancel_continue_shopping">
        {% if page_referer != '' and not is_updateinfo %}
            <a href="{{ page_referer }}">{{ lang.checkout_cancel_and_continue|raw }}</a>
        {% endif %}
        </div>
        {% endblock continue_shopping %}


</div><!-- #sidebar -->
</div><!-- #container -->


<!-- end page content -->

<script>

$('.fc_cart_item_name:contains("Paid")').each(function () {
        $(this).closest('.fc_cart_item').hide();
          return false;
    });
</script>
<script>
 $('input[name="Is_this_a_gift"]').change(function() {
          if(2 == $(this).val()) {
              $("#gift_fields").show();
          } else {
              $("#gift_fields").hide();
          }
      });
</script>



<script type="text/javascript">
// FOR TESTING PURPOSES ONLY
// FoxyCart v0.7.0+
// 2010.12.20
 
FC.checkout.InitCoupon = function() {
    var colspan = jQuery("#fc_cart_foot_total .fc_col1").attr("colspan");
    fc_cart_foot_discount_new = '<tr id="fc_cart_foot_discount_new"><td class="fc_col1" colspan="' + colspan + '"><a href="#" onclick="FC.checkout.AddCoupon(); this.blur(); return false;">Add a coupon</a></td><td class="fc_col2"><input type="text" name="coupon" id="fc_coupon" class="fc_text fc_text_short" value="" style="display:none;" /><a id="fc_coupon_apply" href="javascript:;" style="display:none;">Apply!</a></td></tr>';
 
    if (jQuery('#fc_cart_foot_discount_new').length == 0) {
        jQuery(fc_cart_foot_discount_new).insertBefore('#fc_cart_foot_shipping');
    }
 
    jQuery('#fc_coupon_apply').unbind('click').click(function(){
        var coupon = jQuery('#fc_coupon').val();
        if (coupon != '') {
            FC.checkout.ApplyCoupon(coupon);
        } else {
            alert('Please enter a coupon code.');
        }
    });
}
 
FC.checkout.AddCoupon = function() {
    jQuery("#fc_coupon, #fc_coupon_apply").toggle();
    if (jQuery("#fc_coupon").is(":visible")) {
        jQuery("#fc_coupon")[0].focus();
    }
}
 
FC.checkout.ApplyCoupon = function(coupon) {
    jQuery('#fc_coupon_apply').html('Loading...');
    jQuery.getJSON('https://' + window.location.hostname + '/cart?output=json&' + FC.checkout.config.session + '&coupon=' + coupon + '&callback=?',
        function(data) {
            if (data.messages.errors.length > 0) {
                alert("We're sorry. An error occurred: " + data.messages.errors[0]);
            } else {
                FC.checkout.BuildCouponTR(data.coupons);
            }
            jQuery('#fc_coupon_apply').html('Apply!');
        }
    );
}
 
FC.checkout.BuildCouponTR = function(coupons) {
    var colspan = jQuery("#fc_cart_foot_total .fc_col1").attr("colspan");
    fc_cart_foot_discounts = '';
    FC.checkout.config.orderDiscount = 0;
    for (var coupon in coupons) {
        fc_cart_foot_discounts += '<tr class="fc_cart_foot_discount"><td class="fc_col1" colspan="' + colspan + '">' + coupons[coupon].name + ':</td><td class="fc_col2"><span class="fc_discount">' + FC.formatter.currency(coupons[coupon].discount, true) + '</span></td></tr>';
        FC.checkout.config.orderDiscount += coupons[coupon].discount;
    }
    jQuery(fc_cart_foot_discounts).insertAfter('#fc_cart_foot_subtotal');
    // Set the subtotal amounts
    jQuery('#discount, label[for=discount]').remove();
    if (FC.checkout.config.orderDiscount != 0) {
        discount_total = '<li class="fc_row fc_discount"><label for="discount" class="fc_pre">Discount</label><input type="text" name="discount" id="discount" class="fc_text fc_text_short fc_text_readonly" readonly="readonly" onfocus="this.blur()" value="' + FC.formatter.currency(FC.checkout.config.orderDiscount) + '" /></li>';
        jQuery(discount_total).insertAfter('li.fc_shipping_cost');
    }
    FC.checkout.updatePriceDisplay();
 
    // Comment the following line out if you want to remove the coupon line once a coupon has been added
    jQuery('#fc_cart_foot_discount_new').remove();
}
 
 
jQuery(document).ready(function(){
    var coupon_length = 0;
    for (var c in fc_json.coupons) {
        if (fc_json.coupons[c].hasOwnProperty('id')) coupon_length++;
    }
    if (coupon_length == 0) FC.checkout.InitCoupon();
 
    // If you'd like to display the "apply coupon" regardless of whether
    // or not a coupon has already been added, comment out the above lines and uncomment the following
    // FC.checkout.InitCoupon();
});
</script>

<script type="text/javascript">
function verify_address(address_type) {
 
    //Setup Vars
    var smarty_html_key = "404794707462432964";
 
    var address = $("#" + address_type + "_address1").val();
    var city = $("#" + address_type + "_city").val();
    var state = $("#" + address_type + "_state").val();
    var postal_code = $("#" + address_type + "_postal_code").val();
    var country = $("#" + address_type + "_country").val();
 
    //Not US, Skip
    if ($("#" + address_type + "_country").val() != "US") return;
 
    //Not Enough Vals, Skip
    if (!address || !city || !state) return;
 
    var url = "https://api.smartystreets.com/street-address?street=";
    url += encodeURIComponent(address);
    if ($("#" + address_type + "_address1").val()) url += encodeURIComponent(" " + $("#" + address_type + "_address2").val());
    url += "&city=" + encodeURIComponent(city);
    url += "&state=" + encodeURIComponent(state);
    url += "&zipcode=" + encodeURIComponent(postal_code);
    url += "&candidates=3&auth-token=" + smarty_html_key + "&callback=?";
    jQuery.getJSON(url, function(response) {
        $("#" + address_type + "_address_select").html("");
        if (response.length == 0) {
            $("#" + address_type + "_address_warning").show();
            return false;
        }
        if (response.length == 1) {
            var a = response[0];
            var address1 = a.delivery_line_1;
            var address2 = a.delivery_line_2;
            var city = a.components.city_name;
            var state = a.components.state_abbreviation;
            var postal_code = a.components.zipcode;
            if (a.components.plus4_code) postal_code += "-" + a.components.plus4_code;
 
            $("#" + address_type + "_address1").val(address1);
            $("#" + address_type + "_address2").val(address2);
            $("#" + address_type + "_city").val(city);
            $("#" + address_type + "_state").val(state);
            $("#" + address_type + "_postal_code").val(postal_code);
 
        } else if (response.length > 1) {
            var str = "<p>Your Address Had a Few Options:</p>";
            for (i = 0; i < response.length; i++) {
                var a = response[i];
                var address1 = a.delivery_line_1;
                var address2 = a.delivery_line_2 ? a.delivery_line_2 : '';
                var city = a.components.city_name;
                var state = a.components.state_abbreviation;
                var postal_code = a.components.zipcode;
                if (a.components.plus4_code) postal_code += "-" + a.components.plus4_code;
                str += '<p><a href="#" class="set_verified_address" data-address_type="' + address_type + '" data-address1="' + address1 + '" data-address2="' + address2 + '" data-city="' + city + '" data-state="' + state + '" data-postal_code="' + postal_code + '">';
                str += address1 + "<br>";
                if (address2) str += address1 + "<br>";
                str += a.last_line;
                str += "</a></p>";
            }
            $("#" + address_type + "_address_select").html(str).show();
 
        }
        $("#" + address_type + "_address_warning").hide();
        return true;
    });
}
 
jQuery(document).ready(function($){
    $("#customer_address1, #customer_address2, #customer_city, #customer_state, #customer_state, #customer_postal_code, #customer_country").change(function() {
        verify_address("customer");
    });
    $("#shipping_address1, #shipping_address2, #shipping_city, #shipping_state, #shipping_state, #shipping_postal_code, #shipping_country").change(function() {
        verify_address("shipping");
    });
    $(document).on("click", ".set_verified_address", function() {
        var address_type = $(this).attr("data-address_type");
        $("#" + address_type + "_address1").val($(this).attr("data-address1"));
        $("#" + address_type + "_address2").val($(this).attr("data-address2"));
        $("#" + address_type + "_city").val($(this).attr("data-city"));
        $("#" + address_type + "_state").val($(this).attr("data-state"));
        $("#" + address_type + "_postal_code").val($(this).attr("data-postal_code"));
        $("#" + address_type + "_address_select").html("").hide();
        return false;
    });
    $("#fc_customer_billing_list").append('<li id="customer_address_select" style="display: none;"></li><li id="customer_address_warning" style="display: none; color: #990000; font-weight: bold;">You may want to check this address as it appears it might have a problem.</li>');
    $("#fc_address_shipping_list").append('<li id="shipping_address_select" style="display: none;"></li><li id="shipping_address_warning" style="display: none; color: #990000; font-weight: bold;">You may want to check this address as it appears it might have a problem.</li>');
});
</script>

<?php
include_once('footer.php');
?>