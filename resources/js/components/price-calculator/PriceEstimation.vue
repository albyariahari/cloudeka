<template>
  <div class="cards cards__estimation">
    <div class="card-header">
      <h4 class="font-size-22">
        {{ language == "en" ? "Order Estimation" : "Estimasi Harga" }}
      </h4>
    </div>
    <div class="card-body px-0 pt-0">
      <div class="estimation-category" v-if="cart.cart.length > 0">
        <transition-group name="slide" mode="out-in" appear>
          <div
            class="estimation-category__wrapper"
            v-for="(cartItem, key) in cart.cart"
            :key="cartItem.product_name"
          >
            <div class="estimation-category__title">
              <h5
                class="m-0 font-size-18 txt-secondary"
                style="text-transform: capitalize"
              >
                {{ cartItem.product_name.replace("-", " ") }}
              </h5>
              <div>
                <a
                  href=""
                  @click.prevent="
                    setCalculator(
                      cartItem.product_name,
                      key,
                      cartItem.component
                    )
                  "
                  ><span
                    class="fas fa-pen text-success font-size-15 mr-2"
                  ></span
                ></a>
                <a
                  href=""
                  @click.prevent="
                    deleteEstimation(
                      key,
                      cartItem.component[cartItem.component['quantityName']]
                        .value *
                        cartItem.component[cartItem.component['quantityName']]
                          .subtotal
                    )
                  "
                  ><span
                    class="fas fa-trash-alt text-danger font-size-15"
                  ></span
                ></a>
              </div>
            </div>
            <div
              class="estimation-category__item"
              v-if="hasComponent(cartItem.component, 'server_name')"
            >
              <div class="component-item-wrapper">
                <div class="font-size-14 txt-primary">
                  <span class="txt-bold">Server Name: </span>
                  {{ cartItem.component["server-name"].value }}
                </div>
              </div>
            </div>
            <div
              class="estimation-category__item"
              v-if="
                hasComponent(cartItem.component, 'flavor') &&
                cartItem.component['flavor'].list_items !== undefined
              "
            >
              <div class="component-item-wrapper">
                <div class="font-size-14 txt-primary">
                  <span class="txt-bold">Server Flavor: </span>
                  {{
                    cartItem.component["flavor"].list_items[
                      cartItem.component["flavor"].value
                    ]["name"]
                  }}
                </div>
              </div>
            </div>
            <div
              class="estimation-category__item"
              v-if="hasComponent(cartItem.component, 'commitment-type')"
            >
              <div class="component-item-wrapper">
                <div class="font-size-14 txt-primary">
                  <span class="txt-bold">Commitment Type: </span>
                  {{
                    cartItem.component["commitment-type"].value.replace(
                      /-/g,
                      " "
                    )
                  }}
                </div>
              </div>
            </div>
            <div class="estimation-category__item">
              <div class="component-item-wrapper">
                <div class="font-size-14 txt-primary">
                  <span class="txt-bold">Components</span>
                </div>
              </div>
            </div>
            <div
              class="estimation-category__item"
              v-for="(calComponent, key, index) in cartItem.component"
              :key="calComponent"
              :class="{
                'd-none':
                  excludedComponent.includes(calComponent.slug) ||
                  excludedComponent.includes(key) ||
                  !calComponent.visible ||
                  excludedComponent.includes(calComponent.data_type),
              }"
            >
              <div class="component-item-wrapper">
                <div class="font-size-14 txt-primary">
                  <span class="txt-bold">{{ calComponent.name }}: </span>
                  <span
                    class=""
                    v-if="
                      calComponent.data_type !== 'list-full' &&
                      calComponent.data_type !== 'list-with-child'
                    "
                    >{{ calComponent.value }} {{ calComponent.unit }}
                  </span>
                  <span
                    class=""
                    v-if="
                      calComponent.data_type === 'list-full' ||
                      calComponent.data_type === 'list-with-child'
                    "
                    >{{ calComponent.list_items[calComponent.value].name }}
                    {{ calComponent.unit }}
                  </span>
                </div>
                <span
                  class="font-size-14 txt-secondary"
                  v-if="
                    !excludedSubtotal.includes(key) &&
                    !excludedSubtotal.includes(calComponent.data_type)
                  "
                  >Rp. {{ formatPrice(calComponent.subtotal) }}</span
                >
              </div>
              <div
                class="component-item-wrapper border-cost"
                v-if="Object.keys(cartItem.component).length - 1 == index"
              >
                <div class="txt-primary">
                  <span class="txt-bold font-size-16">Estimate Cost</span>
                </div>
                <span class="font-size-16 txt-secondary"
                  >Rp.
                  {{
                    formatPrice(
                      cartItem.component[cartItem.component["quantityName"]]
                        .value *
                        cartItem.component[cartItem.component["quantityName"]]
                          .subtotal
                    )
                  }}</span
                >
              </div>
            </div>
          </div>
        </transition-group>
        <div id="promo-area">
          <div class="promo-item" v-for="(promo, i) in listPromo" :key="i">
            <div
              class="promo-wrapper"
              v-if="productInCart.includes(promo.product.slug)"
            >
              <div class="promo-title">
                <h3>{{ promo.title }}</h3>
              </div>
              <div class="promo-excerpt">{{ promo.excerpt }}</div>
            </div>
          </div>
        </div>
        <div class="estimation-category__total">
          <div class="estimation-category__item">
            <div class="component-item-wrapper">
              <div class="txt-primary">
                <span class="txt-bold font-size-20">Total Estimation Cost</span>
              </div>
              <span class="font-size-18 txt-secondary"
                >Rp. {{ formatPrice(cart.total) }}</span
              >
            </div>
          </div>
          <div class="button-wrapper text-center">
            <div id="form-area" v-if="formVisible">
              <div class="form-group">
                <label>{{
                  language == "en" ? "Your Name" : "Nama Anda"
                }}</label>
                <input type="text" v-model="name" />
              </div>
              <div class="form-group">
                <label>{{
                  language == "en" ? "Your Email" : "Email Anda"
                }}</label>
                <input type="email" v-model="email" />
              </div>
              <div class="form-group">
                <label>{{
                  language == "en" ? "Your Phone Number" : "Telepon Anda"
                }}</label>
                <input type="text" v-model="phone" />
              </div>
              <div class="form-group">
                <label>{{
                  language == "en" ? "Your Company" : "Perusahaan Anda"
                }}</label>
                <input type="text" v-model="company" />
              </div>
            </div>
            <button
              class="button button__checkout"
              @click="formToggle"
              v-if="!formVisible"
            >
              <span class="txt-bold txt-primary font-size-15">{{
                language == "en" ? "Send me Quotation" : "Kirim Estimasi"
              }}</span>
            </button>

            <button
              class="button button__checkout"
              @click="sendQuotation"
              v-if="formVisible"
              :disabled="disabled"
            >
              <span class="txt-bold txt-primary font-size-15">
                {{ buttonSend }}</span
              >
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Sukses -->
  <div
    class="modal fade modal-calculator"
    id="calculatorSuccess"
    tabindex="-1"
    aria-labelledby="calculatorSuccessLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-center modal-lg">
      <div class="modal-content">
        <div class="close-trigger">
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid-full">
            <div class="row">
              <div class="col-lg-4 modal-home__left">
                <div class="bg-image">
                  <img
                    src="/imgs/calculator-success.png"
                    alt=""
                    class="img-fluid"
                  />
                </div>
              </div>
              <div class="col-lg-8 modal-home__right">
                <div class="wrapper">
                  <div class="subtitle font-size-40">
                    We’ve sent your estimated cost to your email!
                  </div>
                  <div class="font-size-20 dark-color my-4">
                    <p>Thank you for visiting our website!</p>
                    <p>
                      If You’ve any questions please contact us and drop your
                      question.
                    </p>
                    <p class="mt-2 mt-lg-5">We’re Happy to assist you.</p>
                  </div>
                  <button
                    type="button"
                    data-dismiss="modal"
                    aria-label="Close"
                    class="
                      btn btn-grey btn-rounded btn-gradient-grey
                      description
                      mr-3
                    "
                  >
                    No, Thanks
                  </button>
                  <a
                    href="/contact-us"
                    class="
                      btn btn-secondary btn-rounded btn-gradient
                      description
                      mt-0
                    "
                  >
                    Yes, Please
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Gagal -->
  <div
    class="modal fade modal-calculator"
    id="calculatorFailed"
    tabindex="-1"
    aria-labelledby="calculatorFailedLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-center">
      <div class="modal-content">
        <div class="close-trigger">
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid-full">
            <div class="row">
              <div class="col-lg-12 modal-home__right">
                <div class="wrapper">
                  <div class="subtitle subtitle--center font-size-40">
                    Failed!
                  </div>
                  <h2 class="font-size-20 dark-color text-center my-4">
                    Please fill all field!
                  </h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";

export default {
  props: {
    setCalculator: { type: Function },
    language: { type: String },
  },
  data() {
    return {
      excludedSubtotal: [
        "editMode",
        "server-name",
        "cartIndex",
        "flavor",
        "commitment-type",
        "storage-type",
        "quantity",
        "server_name",
        "server_quantity",
      ],
      excludedComponent: [
        "editMode",
        "server-name",
        "cartIndex",
        "flavor",
        "commitment-type",
        "server_name",
      ],
      formVisible: false,
      name: "",
      email: "",
      phone: "",
      company: "",
      buttonSend: "Send",
      disabled: false,
      listPromo: [],
    };
  },
  computed: {
    cart() {
      return this.$store.getters.getCart;
    },
    productInCart() {
      let productSlug = [];
      for (const cartIndex in this.cart.cart) {
        productSlug.push(this.cart.cart[cartIndex]["product_name"]);
      }

      return productSlug;
    },
  },
  created() {
    axios.get("../api/promos").then((response) => {
      this.listPromo = response.data.data;
      console.log(this.listPromo);
    });
  },
  methods: {
    deleteEstimation(key, subtotal) {
      this.$store.commit("deleteEstimation", key);
      this.$store.commit("decreaseTotal", subtotal);
    },
    hasComponent(items, key) {
      let itemComponent = false;

      for (const itemIndex in items) {
        if (itemIndex !== "editMode" && itemIndex !== "cartIndex")
          if (
            items[itemIndex].data_type === key ||
            items[itemIndex].slug === key
          )
            itemComponent = true;
      }

      return itemComponent;
    },
    formatPrice(value) {
      let val = (value / 1).toFixed(0).replace(".", ",");
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
    formToggle() {
      if (this.formVisible) this.formVisible = false;
      else this.formVisible = true;

      console.log("form visible ", this.formVisible);
    },
    sendQuotation() {
      if (
        this.name !== "" &&
        this.email !== "" &&
        this.phone !== "" &&
        this.company !== ""
      ) {
        this.buttonSend = "Processing...";
        this.disabled = true;
        axios({
          method: "post",
          url: "/api/send-estimation",
          data: {
            name: this.name,
            email: this.email,
            phone: this.phone,
            company: this.company,
            cart: this.$store.getters.getCart,
          },
        }).then(
          () => {
            this.buttonSend = "Send";
            this.disabled = false;
            this.name = "";
            this.email = "";
            this.phone = "";
            this.company = "";

            // alert("Success!");
            this.$nextTick(() => {
              $("#calculatorSuccess").modal("show");
            });
          },
          (error) => {
            if (error.response.status == 422) {
              // alert('Please fill email and name!');
              this.$nextTick(() => {
                $("#calculatorFailed").modal("show");
              });
            } else {
              // alert(error.response.statusText);
              this.$nextTick(() => {
                $("#calculatorFailed").modal("show");
              });
            }

            this.buttonSend = "Send";
            this.disabled = false;
          }
        );
      } else {
        // alert('Please fill email and name!');
        this.$nextTick(() => {
          $("#calculatorFailed").modal("show");
        });
      }
    },
  },
};
</script>

<style scoped>
.slide-enter-from,
.slide-leave-to {
  transform: scaleY(0);
}

.estimation-category__wrapper {
  transform-origin: top;
  transition: transform 0.2s ease-in-out;
}
</style>