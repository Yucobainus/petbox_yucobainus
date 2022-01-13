<template>
  <div class="modal-wrapper">
    <div class="modal-wr">
      <div class="exit" @click.prevent="closeModal()">&times;</div>
      <div class="form">
        <div class="form-section">
          <label for="name">Ваше ФИО <span style="color: white">*</span></label>
          <input type="text" name="name" v-model="initials" id="initials" />
        </div>
        <div class="form-section">
          <label for="phone"
            >Ваш Телефон <span style="color: white">*</span></label
          >
          <input type="text" v-model="phone" name="phone" id="phone" />
        </div>
      </div>

      <div class="custom-btn">
        <button @click.prevent="addOrder()">Оформить заказ</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  props: {
    dogA: {
      type: String,
      required: true,
    },
    dogB: {
      type: String,
      required: true,
    },
    dogC: {
      type: String,
      required: true,
    },
    dogD: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      initials: "",
      email: "not",
      phone: "",
      price: "0",
      boxlength: +this.dogA + this.dogB / 2,
      boxwidth: +this.dogC / 2,
      boxheight: +this.dogD * 2 + 5,
    };
  },
  methods: {
    closeModal() {
      this.$emit("showModal");
    },
    addOrder() {
      axios
        .post("api/new-order", {
          height: this.dogA,
          arm: this.dogB,
          width: this.dogC,
          fullheight: this.dogD,
          boxheight: this.boxheight,
          boxwidth: this.boxwidth,
          boxlength: this.boxlength,
          initials: this.initials,
          mail: this.email,
          phone: this.phone,
          price: this.price,
          status: "Новая",
        })
        .then((res) => {
          if (res.data == "done") {
            axios
              .post("api/confirm", {
                height: this.dogA,
                arm: this.dogB,
                width: this.dogC,
                fullheight: this.dogD,
                phone: this.phone,
                initials: this.initials,
              })
              .then((res) => {
                console.log("Done");
              });
            alert("Ваш заказ принят на обработку! С вами свяжутся.");
            (this.initials = ""),
              (this.email = ""),
              (this.phone = ""),
              (this.price = ""),
              this.closeModal();
          }
        });
    },
  },
};
</script>

<style scoped>
.modal-wrapper {
  z-index: 999;
  position: fixed;
  width: 100vw;
  height: 100vh;
  background: rgba(0, 0, 0, 0.9);
}

.modal-wr {
  position: fixed;
  top: 50%;
  left: 50%;
  padding: 15px;
  border-radius: 10px;
  transform: translateX(-50%) translateY(-50%);
  color: white;
  background-color: rgba(255, 78, 91, 0.9);
}

.params {
  display: flex;
}

.form-section {
  display: flex;
  flex-direction: column;
  margin-bottom: 10px;
}

.form-section:first-child {
  padding-bottom: 20px;
  border-bottom: 1px solid white;
}

.form-section input {
  border: none;
  border-radius: 10px;
}

.custom-btn {
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.custom-btn button:hover {
  transition: 0.5s;
}

.custom-btn button {
  transition: 0.5s;
  width: 250px;
  padding: 10px 0;
  margin-top: 5px;
  border-radius: 10px;
  font-weight: 600;
  color: rgba(255, 78, 91, 1);
  align-self: center;
}

.exit {
  position: absolute;
  right: 3%;
  top: -3.5%;
  font-size: 35px;
}

.exit:hover {
  cursor: pointer;
}

.checksum {
  text-align: center;
}
</style>