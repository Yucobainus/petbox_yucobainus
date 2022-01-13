<template>
  <section>
    <div class="layout_padding contact_section">
      <div class="container">
        <h1 class="new_text"><strong>Есть вопросы?</strong></h1>
      </div>
      <div class="container-fluid ram">
        <div class="row">
          <div class="col-md-6">
            <div class="email_box">
              <div class="input_main">
                <div class="container">
                  <form action="/action_page.php">
                    <div class="form-group">
                      <input
                        type="text"
                        class="email-bt"
                        placeholder="Ваше имя"
                        v-model="initial"
                      />
                    </div>
                    <div class="form-group">
                      <input
                        type="text"
                        class="email-bt"
                        placeholder="Ваш телефон"
                        v-model="number"
                      />
                    </div>
                    <div class="form-group">
                      <input
                        type="email"
                        class="email-bt"
                        placeholder="Ваш email"
                        v-model="email"
                      />
                    </div>

                    <div class="form-group">
                      <textarea
                        class="massage-bt"
                        placeholder="Ваш вопрос"
                        rows="5"
                        name="Massage"
                        v-model="appeal"
                      ></textarea>
                    </div>
                  </form>
                </div>
                <div class="send_btn">
                  <button class="main_bt" @click="sendAppeal()">
                    Отправить
                  </button>
                </div>
                <div
                  class="text-danger mt-2 mb-3 p-1 border border-danger"
                  v-if="showError"
                >
                  Ошибка в заполнении!
                </div>
                <div
                  class="text-success mt-2 mb-3 p-1 border border-success"
                  v-if="showSuccess"
                >
                  Заказ успешно добавлен!
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="shop_banner">
              <div class="our_shop">
                <button class="out_shop_bt">GAV</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container map_wrapper">
      <iframe
        src="https://yandex.ru/map-widget/v1/?um=constructor%3Ac74e902df8c49d7da14ba39c40b0bd96a15b7c34cd496ff9d3506fcec38b2ff4&amp;source=constructor"
        width="100%"
        height="400"
        frameborder="0"
      ></iframe>
    </div>
  </section>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      initial: "",
      number: "",
      email: "",
      appeal: "",
      showError: false,
      showSuccess: false,
    };
  },
  methods: {
    sendAppeal() {
      axios
        .post("api/new-appeal", {
          initial: this.initial,
          number: this.number,
          email: this.email,
          appeal: this.appeal,
        })
        .then((res) => {
          if (res.data == "done") {
            this.showSuccess = true;
            this.showError = false;
            axios
              .post("api/mail-appeal", {
                initial: this.initial,
                number: this.number,
                email: this.email,
                appeal: this.appeal,
              })
              .then((res) => {
                console.log(res);
              });
          }
        })
        .catch((err) => {
          this.showError = true;
          this.showSuccess = false;
          console.log(err);
        });
    },
  },
};
</script>

<style scoped>
.map_wrapper {
  margin-bottom: 20px;
  border-top: 1px solid #ff4e5b;
  border-bottom: 4px solid #ff4e5b;
}
</style>