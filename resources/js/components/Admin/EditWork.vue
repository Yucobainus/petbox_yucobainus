<template>
  <div class="admin-content ml-1 d-flex justify-content-center p-5">
    <div class="bg-white d-flex flex-column p-5">
      <div class="form-group">
        <label for="exampleInputEmail1">ФИО Заказчика</label>
        <input type="text" v-model="initials" :placeholder="work.initials" />
        {{work}}
        <small id="emailHelp" class="form-text text-muted">Введите ФИО разделяя слова одним пробелом</small>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Порода собаки</label>
        <input type="text" v-model="species" />
        <small id="emailHelp" class="form-text text-muted"
          >Введите породу собаки разделяя слова одним пробелом</small
        >
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Итоговая цена</label>
        <input type="number" v-model="price" />
        <small id="emailHelp" class="form-text text-muted"
          >Введите цену в рублях</small
        >
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Фото с собакой</label>
        <input
          type="file"
          class="form-control-file"
          name="photowithdog"
          ref="photowithdog"
          @change="addphotowithdog()"
        />
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Фото переноски</label>
        <input
          type="file"
          class="form-control-file"
          name="photobox"
          ref="photobox"
          @change="addphotobox()"
        />
      </div>
      <button class="btn btn-primary" @click="sendCompletedWork()">
        Добавить
      </button>
      <div
        class="text-danger mt-2 mb-3 p-1 border border-danger"
        v-if="isShowError"
      >
        Ошибка в заполнении!
      </div>
      <div
        class="text-success mt-2 mb-3 p-1 border border-success"
        v-if="isShowDone"
      >
        Заказ успешно добавлен!
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  props: {
    work: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      initials: "",
      species: "",
      price: 0,
      photowithdog: {},
      photobox: {},
      isShowDone: false,
      isShowError: false,
    };
  },
  methods: {
    addphotowithdog() {
      this.photowithdog = this.$refs.photowithdog.files[0];
    },
    addphotobox() {
      this.photobox = this.$refs.photobox.files[0];
    },
    sendCompletedWork() {
      let formData = new FormData();
      formData.append("photowithdog", this.photowithdog);
      formData.append("photobox", this.photobox);
      formData.append("initials", this.initials);
      formData.append("price", this.price);
      formData.append("species", this.species);
      axios
        .post("api/change-work", formData, {
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
  },
};
</script>

<style scoped>
.btn-primary {
  background-color: #ff4e5b !important;
  border: none !important;
}

.admin-content {
  width: 100%;
}

.form-group {
  display: flex;
  flex-direction: column;
}
</style>