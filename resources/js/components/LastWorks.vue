<template>
  <section>
    <div class="layout_padding collection_section">
      <div class="container">
        <h1 class="new_text"><strong>Наши последние работы</strong></h1>
        <p class="consectetur_text">Переноски для собак сделанные на заказ</p>
        <div class="collection_section_2">
          <div class="row">
            <div class="col-md-6">
              <div class="about-img">
                <button class="new_bt">Новое</button>
                <div class="shoes-img">
                  <img :src="content[0].photobox.replace('public/', '')" />
                </div>
                <p class="sport_text">{{ content[0].species }}</p>
                <div class="dolar_text">
                  <strong style="color: #f12a47">{{ content[0].price }} </strong
                  >₽
                </div>
              </div>
              <router-link to="/catalog" class="seemore_bt">
                Каталог работ
              </router-link>
            </div>
            <div class="col-md-6">
              <div class="about-img2">
                <div class="shoes-img2">
                  <img :src="content[1].photobox.replace('public/', '')" />
                </div>
                <p class="sport_text">{{ content[1].species }}</p>
                <div class="dolar_text">
                  <strong style="color: #f12a47">{{ content[1].price }} </strong
                  >₽
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      content: {},
    };
  },
  methods: {
    getContent() {
      axios.get("api/get-completed-works/2").then((res) => {
        this.content = res.data[1];
      });
    },
  },
  beforeMount() {
    this.getContent();
  },
};
</script>