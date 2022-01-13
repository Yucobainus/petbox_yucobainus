<template>
  <section>
    <vue-modal
      v-if="isShowModal"
      @showModal="showModal()"
      :dogA="dogA"
      :dogB="dogB"
      :dogC="dogC"
      :dogD="dogD"
    ></vue-modal>
    <div class="collection_section">
      <div class="container">
        <h1 class="new_text"><strong>GAV - гарантия качества</strong></h1>
        <p class="consectetur_text">
          Вы можете создать свою переноску прямо на сайте и узнать её цену
          онлайн.
        </p>
      </div>
    </div>
    <div class="collectipn_section_3 layuot_padding" id="calculator">
      <div class="container">
        <div class="calculator">
          <div class="img-wrapper">
            <img :src="'./images/instr.jpg'" alt="calculator" />
          </div>

          <div class="form-wrapper">
            <div class="form-sec">
              <div class="form-content">
                <label for="height"
                  >A. Длина животного от носа до основания хвоста</label
                >
                <input type="number" name="height" v-model="dogA" />
              </div>
              <div class="form-content">
                <label for="height">B. Высота от земли до локтевого сгиба.</label>
                <input type="number" name="height" v-model="dogB" />
              </div>
              <div class="form-content">
                <label for="height">C. Ширина в плечах</label>
                <input type="number" name="height" v-model="dogC" />
              </div>
              <div class="form-content">
                <label for="height">D. Высота стоящего животного</label>
                <input type="number" name="height" v-model="dogD" />
              </div>

              <div class="form-content" style="margin-top: 30px">
                <button @click="showModal()">Заказать</button>
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
      dogA: 0,
      dogB: 0,
      dogC: 0,
      dogD: 0,
      isShowModal: false,
    };
  },
  methods: {
    showModal() {
      this.isShowModal = !this.isShowModal;
    },
  },
};
</script>

<style scoped>
.dog_property {
  font-size: black;
  font-weight: 600;
  font-size: 20px;
}

.form-content{
  margin: 10px auto !important;
}

.form-content label{
  font-size: 15px !important;
}

</style>