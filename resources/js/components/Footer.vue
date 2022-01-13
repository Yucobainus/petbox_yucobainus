<template>
  <div class="section_footer">
    <div class="container">
      <div class="mail_section">
        <div class="row align-items-center">
          <div class="col-sm-6 col-lg-2">
            <div>
              <router-link to="/">
                <img
                  :src="'images/logo.jpg'"
                  style="max-width: 100px; max-height: 100px"
                />
              </router-link>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3 d-flex align-items-center flex-column">
            <a href="tel:+79778969632" class="footer-logo">
              <img src="images/phone-icon.png" />
              <span class="map_text">+79778969632</span>
            </a>
               <a href="tel:+79268969627" class="footer-logo">
              <img src="images/phone-icon.png" />
              <span class="map_text">+79268969627</span>
            </a>
          </div>
          <div class="col-sm-6 col-lg-3 d-flex align-items-center">
            <div class="footer-logo">
              <img src="images/email-icon.png" /><span class="map_text"
                >79778969632@yandex.ru</span
              >
            </div>
          </div>
          <!-- <div class="col-sm-6 col-lg-3">
            <div class="social_icon">
              <ul>
                <li>
                  <a href="#"><img src="images/fb-icon.png" /></a>
                </li>
                <li>
                  <a href="#"><img src="images/twitter-icon.png" /></a>
                </li>
                <li>
                  <a href="#"><img src="images/in-icon.png" /></a>
                </li>
                <li>
                  <a href="#"><img src="images/google-icon.png" /></a>
                </li>
              </ul>
            </div>
          </div> -->
          <div class="col-sm-2"></div>
        </div>
      </div>
    </div>
  </div>
</template>