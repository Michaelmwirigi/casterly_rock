<!DOCTYPE html>
<html>
  <head>
    <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
    <!-- Standard Meta -->
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0'
      name='viewport'>
    <!-- Site Properities -->
    <title>Contacts</title>


    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dist/semantic.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/dist/semantic.js"></script>
    <script src="<?php echo base_url();?>assets/js/main.js"></script>


  </head>
  <body ng-app ng-controller="AppCtrl">
    <div class="account_chooser">
    </div>
    <div class="ui left vertical visible sidebar" id="sidebar">
      <div class="ui vertical labeled borderless icon menu" id="icon_tabs">
        <a class="item icon_logo"><img src="<?php echo ASSETS_URL;?>images/CastarlyRock.png"></a> <!-- Compose button-->
        <!-- inbox button-->
        <a class="item" data-tab="inbox"><i class="inbox icon"></i>
        Inbox <span class="floating ui tiny circular label">9</span></a> 
        <!-- contacts button-->
        <a class="active item" data-tab="contacts"><i class="users icon"></i>
        Contacts <span class="floating ui tiny circular label">3</span></a> 
        <!-- reports button-->
        <a class="item" data-tab="reports"><i class="bar graph icon"></i>
        Reports</a> <!-- settings button-->
        <a class="item" data-tab="settings"><i class="settings icon"></i>
        Settings</a> <!-- logout button-->
        <a class="item logout"><i class="power icon"></i> Logout</a>
      </div>
    </div>
    <div class="ui grid right_content">
      <!-- additional class names are added from the javascript required for the sidebar -->
      <div class="ui large borderless attached menu mobile_menu computer_hide">
        <div class="item sidebar_toggle">
          <i class="black big content icon"></i>
        </div>
        <div class="header item">Inbox</div>
      </div>
      <div class="column2">
        <div class="ui top attached large borderless menu dashboard_menu tablet_hide">
          <div class="search item">
            <div class="ui icon small input">
              <input type="text" placeholder="Search..." class="prompt">
              <i class="search icon"></i>
            </div>
          </div>
          
          <div class="right menu">
            <a class="item toggle_column3"><i class="circular info icon"></i></a>
          </div>
        </div>
        <div class="contacts_top">
            <ul class="ui bound sticky item">
              <li class="ui relaxed small horizontal list contact_list">
                <span class="ui checkbox item c_checkbox " id="selectall">
                <input type="checkbox" tabindex="0" class="hidden" name="selectall">
                </span>
                <span class="item">
                  <h2 class="ui header">3000</h2>
                  total contacts
                </span>
                <span class="item">
                  <h2 class="ui header">10</h2>
                  not on whatsapp
                </span>
                <span class="item">
                  <h2 class="ui header">5</h2>
                  not sure
                </span>
                <span class="item">
                  <h2 class="ui header">12</h2>
                  not verified
                </span>
                <span class="item">
                  <h2 class="ui header">2455</h2>
                  not verified
                </span>
              </li>
            </ul>
          </div>
        <div class=" ui grid contacts_content">
          
          
          <div class="ui middle aligned divided list all_contacts">
            
            <ul class="item">
              <li class="ui horizontal list contact_list">
                <span class="item c_name">
                  Chicken wings
                </span>
                <span class="item c_quantitiy">
                <select class="ui admin dropdown" name="quantity">
                  <option value="">No of pieces</option>
                  <option value="5">5</option>
                  <option value="10">10</option>
                  <option value="15">15</option>
                </select>
                </span>
                <a class="item c_save">
                  <button class="ui labeled icon orange button">Save<i class="save icon"></i></button>
                
                </a>
                <span class="item c_delete">
                  <button class="ui labeled icon red button">Delete<i class="remove icon"></i></button>
                </span>
              </li>
            </ul>
            <ul class="item">
              <li class="ui horizontal list contact_list">
                <span class="ui checkbox item c_checkbox">
                <input type="checkbox" tabindex="0" class="hidden checkbox">
                </span>
                <span class="item c_image">
                <img class="ui avatar image" src="images/user1.jpg">
                </span>
                <span class="item c_name">
                John Smalls
                </span>
                <span class="item c_number">
                254724337339
                </span>
                <a class="item c_edit toggle_column3">
                <i class="edit icon"></i>
                </a>
                <span class="item c_verify">
                <img src="images/sent.png">
                </span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>