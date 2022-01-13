<template>
  <div class="admin-content ml-1 d-flex justify-content-center p-5">
    <div v-for="item in content" class="content-item" :key="item.id">
      <div class="full-content">
        <div class="content-property main-content d-flex flex-column">
          <span class="prop-title">Фото переноски: </span>
          <img :src="item.photobox" />
        </div>

        <div class="content-property main-content d-flex flex-column">
          <span class="prop-title">Фото с собакой: </span>
          <img :src="item.photowithdog" />
        </div>

        <div class="content-property main-content">
          <span class="prop-title">ФИО клиента: </span> {{ item.initials }}
        </div>
        <div class="content-property main-content">
          <span class="prop-title">Порода собаки: </span>
          {{ item.species }}
        </div>
        <div class="content-property main-content">
          <span class="prop-title">Итоговая цена: </span>
          {{ item.price }}
        </div>
        <button class="btn btn-danger" @click="removeWork(item.id)">
          Удалить
        </button>
        <button class="btn btn-warning" @click="editWork(item.id)">
          Редактировать
        </button>
      </div>
    </div>
  </div>
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
    getAllWorks() {
      axios.get("api/get-completed-works/all").then((res) => {
        this.content = res.data[1];
      });
    },
    removeWork(id) {
      axios.get(`api/remove-work/${id}`).then((res) => {
        this.getAllWorks();
      });
    },
    editWork(id){
      this.$emit("getOneWork",[id]);
    }
  },
  mounted() {
    this.getAllWorks();
  },
};
</script>

<style scoped>
.initials {
  text-decoration: underline;
  font-weight: 700 !important;
}

.content-item {
  margin: 10px;
  padding: 20px;
  border-radius: 15px;
}

.content-item {
  background-color: white;
}

.main-content {
  border: 1px solid #ff4e5b;
  padding: 5px;
  margin-bottom: 10px;
}

.content-property img {
  max-width: 250px;
}

.prop-title {
  color: #ff4e5b;
  font-weight: 700;
}
</style>