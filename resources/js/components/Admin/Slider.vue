<template>
  <div>
    <div class="block-wrapper d-flex flex-column">
      <div
        class="carousel-item active"
        style="background-image: url(../images/banner.png); padding: 10px"
      >
        <div class="row">
          <div class="col-sm-5">
            <div class="banner_taital">
              <input
                type="text"
                class="banner_text admin-input"
                v-model="title1"
              />
              <textarea
                type="text"
                rows="3"
                class="mens_text admin-input"
                v-model="title2"
              ></textarea>
              <input
                type="text"
                class="lorem_text admin-input"
                v-model="description"
              />

              <button class="buy_bt" v-if="isShowButton">
                <input
                  type="text"
                  class="lorem_text admin-input"
                  style="display: inline-block"
                  v-model="button"
                />
              </button>
            </div>
          </div>
          <div class="col-sm-5 main_pics"></div>
        </div>
      </div>
      <div class="options mt-3 d-flex flex-column">
        <div class="form-section">
          <label for="turn_btn"> Включить кнопку </label>
          <input type="checkbox" id="turn_btn" v-model="isShowButton" />
        </div>
        <input
          placeholder="Введите ссылку для кнопки"
          style="max-width: 500px"
          v-model="link"
          v-if="isShowButton"
        />
        <div class="form-section d-flex flex-column mt-3">
          <label> Добавить картинку </label>
          <input type="file" ref="photo" @change="addphoto()" />
        </div>
        <div class="form-section d-flex flex-column mt-3">
          <button class="buy_bt" @click="addSlide()">Добавить слайд</button>
        </div>
        <div
          class="text-danger mt-2 mb-3 p-1 border border-danger"
          v-if="isShowError"
        >
          Произошла ошибка!
        </div>
        <div
          class="text-success mt-2 mb-3 p-1 border border-success"
          v-if="isShowDone"
        >
          Слайд успешно добавлен!
        </div>
      </div>
    </div>

<div class="d-flex justify-content-center align-items-center bg-white">
<h1 style="padding: 0 !important; font-weight: 800">Существующие слайды</h1>
 </div>

    <div v-if="Object.keys(slides).length !== 0">
      <div
        class="block-wrapper d-flex flex-column"
        v-for="slide in slides"
        :key="slide.id"
      >
        <div
          class="carousel-item active"
          style="background-image: url(../images/banner.png); padding: 10px"
        >
          <div class="row mt-5 mb-5">
            <div class="col-sm-5">
              <div class="banner_taital">
                <input
                  type="text"
                  class="banner_text admin-input"
                  v-model="slide.title1"
                />
                <textarea
                  type="text"
                  rows="3"
                  class="mens_text admin-input"
                  v-model="slide.title2"
                ></textarea>
                <input
                  type="text"
                  class="lorem_text admin-input"
                  v-model="slide.description"
                />

                <button class="buy_bt" v-if="isShowButton">
                  <input
                    type="text"
                    class="lorem_text admin-input"
                    style="display: inline-block"
                    v-model="button"
                  />
                </button>
              </div>
            </div>
            <div class="col-sm-5 main_pics" v-if="slide.image !== null">
              <img :src="slide.image.replace('public/', '')" />
            </div>
          </div>
        </div>

        <div class="options mt-3 d-flex flex-column">
          <div class="form-section d-flex flex-column mt-3">
            <button class="buy_bt" @click="deleteSlide(slide.id)">
              Удалить
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      title1: "Введите верхний заголовок",
      title2: "Введите основной заголовок",
      description: "Введите дополнительный текст",
      button: "Введите название для кнопки",
      link: "Укажите ссылку для кнопки",
      isShowButton: false,
      photo: {},
      isShowDone: false,
      isShowError: false,
      slides: {},
    };
  },
  methods: {
    addphoto() {
      this.photo = this.$refs.photo.files[0];
    },
    addSlide() {
      let formData = new FormData();
      formData.append("title1", this.title1);
      formData.append("title2", this.title2);
      formData.append("description", this.description);
      formData.append("button", this.button);
      formData.append("link", this.link);
      formData.append("photo", this.photo);
      axios
        .post("api/add-slide", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((res) => {
          if (res.data == "done") {
            this.isShowDone = true;
            this.isShowError = false;
          }
        })
        .catch((err) => {
          this.isShowError = true;
          this.isShowDone = false;
          console.log(err);
        });
    },
    deleteSlide(id) {
      axios.get(`api/del-slide/${id}`).then((res) => {
        this.allSlides();
      });
    },
    allSlides() {
      axios.get("api/all-slides").then((res) => {
        this.slides = res.data;
        console.log(this.slides);
      });
    },
  },
  beforeMount() {
    this.allSlides();
  },
};
</script>

<style scoped>
textarea {
  resize: none;
}

textarea::-webkit-scrollbar {
  display: none;
}

.admin-input {
  background-color: transparent;
  border: none;
}

.mens_text {
  width: 450px;
  font-weight: 800;
}

.block-wrapper {
  width: 100%;
  margin: 10px;
  padding: 10px;
  align-self: center;
  background-color: white;
}

.main_pics {
  display: flex;
  justify-content: center;
}

.img_main img {
  max-width: 200px;
}

.first img {
  margin-left: 20%;
}

.last img {
  margin-left: -30%;
}
</style>