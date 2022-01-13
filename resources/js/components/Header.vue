<template>
  <div class="header_section">
    <noscript><div><img src="https://mc.yandex.ru/watch/84528538" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="logo">
            <router-link to="/">
              <img
                :src="'images/logo.jpg'"
                style="max-width: 150px; max-height: 150px"
              />
            </router-link>
          </div>
        </div>
        <div class="col-sm-9">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarNavAltMarkup"
              aria-controls="navbarNavAltMarkup"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <router-link to="/" class="nav-item nav-link">
                  Главная
                </router-link>
                <router-link to="/catalog" class="nav-item nav-link">
                  Каталог работ
                </router-link>
                <router-link to="/contact" class="nav-item nav-link">
                  Контакты
                </router-link>
                <a
                  class="nav-item nav-link"
                  v-if="isCalcShow"
                  href="#calculator"
                  >Калькулятор</a
                >
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
    <vue-banner v-if="isBannerShow"></vue-banner>
  </div>
</template>

<script>
export default {
  props: {
    isBannerShow: {
      type: Boolean,
      required: true,
    },
  },
  data() {
    return {
      isCalcShow: false,
    };
  },
  methods: {
    checkCalc() {
      console.log(this.$route);
      if (this.$route.path == "/") {
        this.isCalcShow = true;
      }
    },
  },
  mounted() {
    this.checkCalc();
  },
};
</script>

