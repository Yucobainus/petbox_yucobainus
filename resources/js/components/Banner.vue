<template>
  <div class="banner_section">
    <div class="container-fluid">
      <section class="slide-wrapper">
        <div class="container-fluid">
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li
                data-target="#myCarousel"
                data-slide-to="0"
                class="active"
              ></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
              <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  <div class="col-sm-5">
                    <div class="banner_taital">
                      <h1 class="banner_text">Мастерская GAV</h1>
                      <h1 class="mens_text">
                        <strong>Удобство для вашего питомца</strong>
                      </h1>
                      <p class="lorem_text">
                        Гарантия качества и выполнения заказа в срок!
                      </p>
                      <button class="buy_bt">
                        <a href="#calculator" style="display: inline-block"
                          >Заказать</a
                        >
                      </button>
                    </div>
                  </div>
                  <div class="col-sm-5 main_pics">
                    <div class="shoes_img first img_main">
                      <img :src="'images/dog_main.png'" />
                    </div>
                    <div class="shoes_img img_main last">
                      <img :src="'images/dog_main2.png'" />
                    </div>
                  </div>
                </div>
              </div>

              <div
                v-for="slide in slides"
                :key="slide.id"
                class="carousel-item"
              >
                <div class="row">
                  <div class="col-sm-5">
                    <div class="banner_taital">
                      <h1 class="banner_text">{{ slide.title1 }}</h1>
                      <h1 class="mens_text">
                        <strong>{{ slide.title2 }}</strong>
                      </h1>
                      <p class="lorem_text">
                        {{ slide.description }}
                      </p>
                      <button class="buy_bt" v-if="slide.button != 'Введите название для кнопки'">
                        <a
                          :href="slide.btn_link"
                          style="display: inline-block"
                        >
                          {{ slide.button }}
                        </a>
                      </button>
                    </div>
                  </div>
                  <div class="col-sm-5 main_pics">
                    <div class="shoes_img first img_main" v-if="slide.image != null">
                      <img :src="slide.image.replace('public/', '')" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      slides: {},
    };
  },
  methods: {
    getAllSlides() {
      axios.get("api/all-slides").then((res) => {
        this.slides = res.data;
      });
    },
  },
  beforeMount() {
    this.getAllSlides();
  },
};
</script>

<style scoped>
.main_pics {
  display: flex;
  justify-content: center;
}

.img_main img {
  max-width: 200px;
  align-self: center;
}

.first img {
  margin-left: 20%;
}

.last img {
  margin-left: -30%;
}
</style>