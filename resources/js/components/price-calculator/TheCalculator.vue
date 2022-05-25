<template>
  <section class="sections calculator">
    <div class="container-fluid">
      <div class="row calculator__wrapper">
        <div class="col-xl-9 calculator__content">
          <div class="row wrapper">
            <div class="col-lg-4 pr-lg-0 mb-5 mb-lg-0">
              <aside class="calculator__sidebar">
                <ul class="accordion nav flex-column" id="accordionSidebar">
                  <!-- Infrastructure Menu -->
                  <li
                    class="card nav-item"
                    v-for="(item, key) in productCategories"
                    :class="{ 'd-none': item.products.length == 0 }"
                    :key="key"
                  >
                    <div
                      class="card-header"
                      :id="'heading' + item.category_slug"
                      data-toggle="collapse"
                      :data-target="'#collapse' + item.category_slug"
                      aria-expanded="true"
                      :aria-controls="'collapse' + item.category_slug"
                    >
                      <h6 class="mb-0 font-size-18">
                        {{ item.category }}
                        <i
                          class="fa fa-chevron-down font-size-13"
                          aria-hidden="true"
                        ></i>
                      </h6>
                    </div>
                    <div
                      :id="'collapse' + item.category_slug"
                      class="collapse"
                      :class="{ show: selectedCategory == item.category_slug }"
                      :aria-labelledby="'heading' + item.category_slug"
                      data-parent="#accordionSidebar"
                    >
                      <div class="card-body">
                        <ul class="nav flex-column">
                          <li
                            class="nav-item"
                            v-for="(product, i) in item.products"
                            :key="i"
                          >
                            <a
                              class="nav-link font-size-16 txt-medium"
                              :class="{ active: selectedMenu == product.slug }"
                              href="#"
                              @click.prevent="
                                setSelectedTab(product.slug),
                                  setMenuActive(product.slug)
                              "
                              >{{ product.title }}</a
                            >
                          </li>
                        </ul>
                      </div>
                    </div>
                  </li>
                </ul>
              </aside>
            </div>
            <div class="col-lg-8 pl-lg-0">
              <main style="width: 100%; height: 100%; padding-top: 0">
                <div
                  class="content-wrapper container-fluid d-none"
                  :class="{ 'd-block': calculator_name == selectedTab }"
                  v-for="(calculator, calculator_name) in calculatorItems"
                  :key="calculator_name"
                  :id="calculator_name"
                >
                  <div class="container">
                    <h2 class="font-size-25 txt-secondary">
                      {{ calculator.product_name }}
                    </h2>
                    <div class="row">
                      <div class="col-12">
                        <form @submit.prevent="submitFormPremium">
                          <!-- Commitment Type -->
                          <div
                            class="form-group form-group--border"
                            v-if="
                              hasComponent(
                                calculator.calculator_component,
                                'commitment-type'
                              )
                            "
                          >
                            <label
                              class="font-size-22 txt-secondary txt-semibold"
                              >Commitment Type</label
                            >
                            <select
                              name="database"
                              id=""
                              class="select-custom mb-0"
                              v-model="
                                modelComponent[calculator_name][
                                  'commitment-type'
                                ]['value']
                              "
                            >
                              <option
                                v-for="list_item in modelComponent[
                                  calculator_name
                                ]['commitment-type'].list_items"
                                :key="list_item.name"
                                :value="list_item.slug"
                              >
                                {{ list_item.name }}
                              </option>
                            </select>
                          </div>

                          <!-- Server Name -->
                          <div
                            class="form-group form-group--border"
                            v-if="
                              hasComponent(
                                calculator.calculator_component,
                                'server_name'
                              )
                            "
                          >
                            <label
                              class="font-size-22 txt-secondary txt-semibold"
                              >{{
                                modelComponent[calculator_name]["server-name"][
                                  "name"
                                ]
                              }}</label
                            >
                            <input
                              type="text"
                              name="name"
                              class="custom-input"
                              v-model="
                                modelComponent[calculator_name]['server-name'][
                                  'value'
                                ]
                              "
                            />
                          </div>

                          <!-- Flavor -->
                          <div
                            class="form-group form-group--border"
                            v-if="
                              modelComponent[calculator_name]['flavor'][
                                'list_items'
                              ] !== undefined
                            "
                          >
                            <label
                              class="font-size-22 txt-secondary txt-semibold"
                              >Server Flavor</label
                            >
                            <select
                              name="database"
                              id="flavor"
                              class="select-custom mb-0"
                              @change="changeFlavor($event, calculator_name)"
                              v-model="selectedFlavor"
                            >
                              <optgroup :label="group_item.name" v-for="(
                                  group_item, group_index
                                ) in modelComponent[calculator_name]['flavor_group']" :key="group_item.name">
                                <option
                                  v-for="(
                                    package_item, package_index
                                  ) in group_item.items"
                                  :key="package_item.name"
                                  :value="package_item.name"
                                  :data-index="package_index"
                                >
                                  {{ package_item.name }} (vCPUs: {{ getComponentValue(package_item.package_component, 'vcpu', false) }}, RAM: {{ getComponentValue(package_item.package_component, 'ram', true) }})
                                </option>
                              </optgroup>
                            </select>
                          </div>

                          <!-- Persistant Volume -->
                          <div
                            class="form-group form-group--border"
                            v-if="
                              hasComponent(
                                calculator.calculator_component,
                                'persistant-volume'
                              )
                            "
                          >
                            <label
                              class="font-size-22 txt-secondary txt-semibold"
                              >{{
                                modelComponent[calculator_name][
                                  "persistant-volume"
                                ]["name"]
                              }}
                              ({{
                                modelComponent[calculator_name][
                                  "persistant-volume"
                                ]["unit"]
                              }})</label
                            >
                            <base-quantity
                              @updateQuantity="updateQuantity"
                              :modelNameProduct="calculator_name"
                              :itemObject="
                                getComponentItem(
                                  calculator.calculator_component,
                                  'persistant-volume'
                                )
                              "
                              :initValue="
                                getComponentItem(
                                  calculator.calculator_component,
                                  'persistant-volume'
                                ).value
                              "
                            ></base-quantity>
                          </div>

                          <!-- Custom Components -->
                          <h6 class="font-size-22 txt-secondary txt-semibold">
                            Components
                          </h6>
                          <div class="row component-wrapper">
                            <div
                              :class="
                                'component-item col-lg-6 visible-' +
                                item.visible +
                                (item.default_visible == 0
                                  ? ' visible-false'
                                  : '') +
                                (item.display_mode == '100%'
                                  ? ' col-lg-12'
                                  : '')
                              "
                              v-for="(item, key_item) in filterComponent(
                                calculator.calculator_component,
                                'data_type',
                                [
                                  'server_name',
                                  'commitment-type',
                                  'flavor',
                                  'persistant-volume',
                                ],
                                'exclude'
                              )"
                              :key="calculator_name + '_' + key_item"
                            >
                              <div
                                class="form-group text-center"
                                v-if="item.visible"
                              >
                                <div class="font-size-18 txt-secondary">
                                  {{ item.name }}
                                  <span v-if="item.unit !== null"
                                    >({{ item.unit }})</span
                                  >
                                  <!-- <span class="custom-hint" data-toggle="tooltip" data-placement="right" :title=" item.hint " v-if=" item.hint !== null && item.hint !== '' ">?</span> -->
                                  <!-- <span class="custom-hint" data-toggle="tooltip" data-placement="top" title="Tooltip on top">{{ item.hint }}</span> -->
                                  <Popper
                                    class="custom-hint"
                                    v-if="
                                      item.hint !== null && item.hint !== ''
                                    "
                                    placement="right"
                                  >
                                    <button class="custom-hint__trigger">
                                      ?
                                    </button>
                                    <template #content>
                                      <div class="custom-hint__content">
                                        {{ item.hint }}
                                      </div>
                                    </template>
                                  </Popper>
                                </div>

                                <!-- If Data Type Integer -->
                                <base-quantity
                                  @updateQuantity="updateQuantity"
                                  :modelNameProduct="calculator_name"
                                  :itemObject="item"
                                  :initValue="item.value"
                                  v-if="
                                    item.data_type === 'integer' ||
                                    item.data_type == 'server_quantity'
                                  "
                                  :disabled="!item.rule_editable"
                                ></base-quantity>

                                <!-- If Data Type Integer -->
                                <base-quantity
                                  @updateQuantity="updateQuantity"
                                  :modelNameProduct="calculator_name"
                                  :itemObject="item"
                                  :initValue="item.value"
                                  v-if="item.data_type === 'integer-free-input'"
                                  :disabled="!item.rule_editable"
                                ></base-quantity>

                                <!-- If Data Type String -->
                                <input
                                  type="text"
                                  name="name"
                                  class="custom-input"
                                  v-model="
                                    modelComponent[calculator_name][item.slug][
                                      'value'
                                    ]
                                  "
                                  v-if="item.data_type === 'string'"
                                />

                                <select
                                  name="database"
                                  id=""
                                  class="select-custom"
                                  v-model="
                                    modelComponent[calculator_name][item.slug][
                                      'value'
                                    ]
                                  "
                                  v-if="item.data_type === 'list'"
                                >
                                  <option
                                    v-for="list_item in item.list_items"
                                    :key="list_item.name"
                                    :value="list_item.slug"
                                  >
                                    {{ list_item.name }}
                                  </option>
                                </select>

                                <select
                                  name="database"
                                  id=""
                                  class="select-custom"
                                  v-model="
                                    modelComponent[calculator_name][item.slug][
                                      'value'
                                    ]
                                  "
                                  v-if="item.data_type === 'list-with-child'"
                                  @change="
                                    switchChild($event, calculator_name, item)
                                  "
                                >
                                  <option
                                    v-for="(list_item, key) in item.list_items"
                                    :key="list_item.name"
                                    :value="key"
                                    :data-slug="list_item.slug"
                                    :data-target="list_item.target"
                                  >
                                    {{ list_item.name }}
                                  </option>
                                </select>

                                <select
                                  name="database"
                                  id=""
                                  class="select-custom"
                                  v-if="item.data_type === 'boolean'"
                                  v-model="
                                    modelComponent[calculator_name][item.slug][
                                      'value'
                                    ]
                                  "
                                >
                                  <option value="false">No</option>
                                  <option value="true">Yes</option>
                                </select>

                                <select
                                  name="database"
                                  id=""
                                  class="select-custom"
                                  v-if="item.data_type === 'list-full'"
                                  v-model="
                                    modelComponent[calculator_name][item.slug][
                                      'value'
                                    ]
                                  "
                                >
                                  <option
                                    v-for="(
                                      list_item, key_list_full
                                    ) in item.list_items"
                                    :key="list_item.name"
                                    :value="key_list_full"
                                  >
                                    {{ list_item.name }}
                                  </option>
                                </select>
                              </div>
                            </div>
                            <!-- <div class="col-lg-6" v-if="hasComponent(calculator.calculator_component, 'server_quantity') && (getComponentItem(calculator.calculator_component, 'server_quantity')).rule_editable == 1">
														<div class="form-group text-center">
															<div class="font-size-18 txt-secondary">Quantity</div>
															<base-quantity @updateQuantity="updateQuantity" :modelNameProduct="calculator_name" :itemObject="getComponentItem(calculator.calculator_component, 'server_quantity')" :initValue="(getComponentItem(calculator.calculator_component, 'server_quantity')).value"></base-quantity>
														</div>
													</div> -->
                          </div>
                          <div class="form-group mt-4 text-center">
                            <button
                              class="button button__add font-20"
                              @click="addToCart(calculator_name)"
                            >
                              Submit
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div v-for="component in components" :key="component.id">
                      <pre>{{ component }}</pre>
                    </div>
                  </div>
                </div>
              </main>
            </div>
          </div>
        </div>
        <div class="col-xl-3 calculator__estimation">
          <price-estimation
            :setCalculator="setCalculator"
            :language="language"
          ></price-estimation>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from "axios";
import BaseQuantity from "../base/BaseQuantity.vue";
import PriceEstimation from "./PriceEstimation.vue";
import Popper from "vue3-popper";

export default {
  components: {
    BaseQuantity,
    PriceEstimation,
    Popper,
  },
  props: ["language"],
  data() {
    return {
      selectedCategory: "",
      selectedTab: "",
      selectedMenu: "",
      editMode: false,
      calculatorItems: [],
      estimations: [],
      modelComponent: [],
      productCategories: [],
      cartIndex: 0,
      selectedFlavor: ''
    };
  },
  methods: {
    setCalculator(calculatorName, cartIndex, component) {
      this.selectedTab = calculatorName;
      this.modelComponent[calculatorName].editMode = true;
      this.modelComponent[calculatorName].cartIndex = cartIndex;
      this.cartIndex = cartIndex;

      for (const tempComponent in this.modelComponent[calculatorName]) {
        if (
          tempComponent !== "cartIndex" &&
          tempComponent !== "editMode" &&
          tempComponent !== "quantityName"
        )
          this.modelComponent[calculatorName][tempComponent].value =
            component[tempComponent].value;
      }

      if(this.modelComponent[calculatorName]['flavor'] != undefined)
        this.selectedFlavor = this.modelComponent[calculatorName]['flavor']['list_items'][this.modelComponent[calculatorName]['flavor']['value']]['name']
    },
    setSelectedTab(tab) {
      this.selectedTab = tab;
    },
    setMenuActive(menu) {
      this.selectedMenu = menu;
    },
    addToCart(calculatorName) {
      let valid = this.validateCalculator(calculatorName);
      this.calculateCalculator(calculatorName);
      this.calculatePricingImpactRules(calculatorName);

      if (valid) {
        if (!this.modelComponent[calculatorName].editMode) {
          this.$store.commit("addToCart", {
            product_name: calculatorName,
            component: JSON.parse(
              JSON.stringify(this.modelComponent[calculatorName])
            ),
          });
        } else {
          this.$store.commit("updateCart", {
            cart_index: this.modelComponent[calculatorName].cartIndex,
            component: JSON.parse(
              JSON.stringify(this.modelComponent[calculatorName])
            ),
          });
          this.modelComponent[calculatorName].editMode = false;
          this.modelComponent[calculatorName].cartIndex = -1;
        }

        this.$store.commit("calculatePrice");
        this.resetValue(calculatorName);
      } else {
        alert("Please fill all field");
      }
    },
    validateCalculator(calculatorName) {
      let valid = true;

      for (const itemComponent in this.modelComponent[calculatorName]) {
        if (
          itemComponent !== "cardIndex" &&
          itemComponent !== "editMode" &&
          itemComponent !== "server-name"
        ) {
          if (this.modelComponent[calculatorName][itemComponent].value === "") {
            valid = false;
          }
        }
      }

      return valid;
    },
    calculateCalculator(calculatorName) {
      let paymentType = this.getPaymentType(calculatorName);
      let grandTotal = 0;
      let subTotal;

      let excludedComponent = [
        "editMode",
        "server-name",
        "cardIndex",
        "flavor",
        "commitment-type",
        "server_name",
      ];

      for (const itemComponent in this.modelComponent[calculatorName]) {
        subTotal = 0;
        let currentComponent =
          this.modelComponent[calculatorName][itemComponent];

        if (
          !excludedComponent.includes(itemComponent) &&
          !excludedComponent.includes(
            this.modelComponent[calculatorName][itemComponent].data_type
          )
        ) {
          /*
           * cardIndex, editMode dan server-name tidak perlu dikalkulasi
           * hal ini karena pada 3 component tersebut tidak mempengaruhi
           * hasil estimasi dari kalkulator
           */

          if (
            currentComponent.visible &&
            currentComponent.price !== undefined
          ) {
            // Component yang dilihat di FE saja yang dikalkulasi
            // Component juga harus memiliki item "price"

            currentComponent.subtotal = subTotal;

            /*
             * Komponen harus divalidasi dahulu apakah dihitung atau tidak
             * hal ini dikarnakan ada beberapa komponen memiliki rule tambahan
             * terkait dengan value dari component lainnya
             *
             * Default dari setiap component itu adalah "valid/dihitung" hingga
             * ada rule yang menyatakan component tersebut tidak dihitung/tidak valid
             */
            let isValid = true;
            let otherRules = currentComponent.other_rules;
            for (const indexRule in otherRules) {
              let componentInRule =
                this.modelComponent[calculatorName][otherRules[indexRule].slug];

              console.log("Compare Rule ", currentComponent);
              console.log(
                "Compare Rule ",
                componentInRule.value,
                " : ",
                otherRules[indexRule].value
              );
              if (componentInRule.value !== otherRules[indexRule].value) {
                isValid = false;
                break;
              }
            }

            if (isValid) {
              if (
                currentComponent.data_type !== "list-full" &&
                currentComponent.data_type !== "boolean"
              ) {
                /*
                 * Boolean tidak memiliki quantity, sehingga dilakukan perhitungan
                 * ditempat terpisah
                 */

                subTotal =
                  currentComponent.value *
                  parseInt(currentComponent.price[paymentType]);
                currentComponent.subtotal = subTotal;
              } else if (currentComponent.data_type === "boolean") {
                if (currentComponent.value === "true") {
                  subTotal = parseInt(currentComponent.price[paymentType]);
                  currentComponent.subtotal = subTotal;
                }
              } else {
                console.log(currentComponent);
                let selectedListItems =
                  currentComponent.list_items[currentComponent.value];
                subTotal = parseInt(selectedListItems.price[paymentType]);
                currentComponent.subtotal = subTotal;
              }
            }
          }
        }

        grandTotal += subTotal;
        console.log(
          "itemComponent: ",
          itemComponent,
          " - ",
          subTotal,
          "Grand Total: ",
          grandTotal
        );
      }

      this.modelComponent[calculatorName][
        this.modelComponent[calculatorName]["quantityName"]
      ].subtotal = grandTotal;
    },
    calculatePricingImpactRules(calculatorName) {
      let excludedComponent = [
        "editMode",
        "server-name",
        "cardIndex",
        "flavor",
        "commitment-type",
      ];

      for (const itemComponent in this.modelComponent[calculatorName]) {
        let currentComponent =
          this.modelComponent[calculatorName][itemComponent];

        if (!excludedComponent.includes(itemComponent)) {
          /*
           * cardIndex, editMode dan server-name tidak perlu dikalkulasi
           * hal ini karena pada 3 component tersebut tidak mempengaruhi
           * hasil estimasi dari kalkulator
           */

          if (
            currentComponent.visible &&
            currentComponent.pricing_impact_rules !== undefined
          ) {
            // Component yang dilihat di FE saja yang dikalkulasi
            // Component juga harus memiliki item "pricing_impact_rules"

            /*
             *
             */
            let pricingImpactRules = currentComponent.pricing_impact_rules;
            for (const indexRule in pricingImpactRules) {
              let currentRule = pricingImpactRules[indexRule];

              console.log("Compare condition before implement rules ");
              console.log(currentRule.value, currentComponent.value);

              if (currentRule.value == currentComponent.value) {
                console.log("Current Rule Slug: ", currentRule.slug);
                let componentInRule =
                  this.modelComponent[calculatorName][currentRule.slug];

                if (componentInRule.data_type === "list-with-child") {
                  let childTarget =
                    componentInRule.list_items[componentInRule.value].slug;
                  componentInRule =
                    this.modelComponent[calculatorName][childTarget];
                }

                for (const indexAction in currentRule.action) {
                  console.log(componentInRule);
                  let currentAction = currentRule.action[indexAction];
                  let originalValue = componentInRule.subtotal;

                  switch (currentAction.operation) {
                    case "multiplication":
                      componentInRule.subtotal *= parseInt(
                        currentAction.operation_value
                      );
                      break;

                    case "division":
                      componentInRule.subtotal /= parseInt(
                        currentAction.operation_value
                      );
                      break;

                    case "addition":
                      componentInRule.subtotal += parseInt(
                        currentAction.operation_value
                      );
                      break;

                    case "subtraction":
                      componentInRule.subtotal -= parseInt(
                        currentAction.operation_value
                      );
                      break;

                    default:
                      break;
                  }

                  if (componentInRule.slug !== "quantity")
                    this.modelComponent[calculatorName]["quantity"].subtotal +=
                      componentInRule.subtotal - originalValue;
                }
              }
            }
          }
        }
      }
    },
    getPaymentType(calculatorName) {
      let paymentType = this.modelComponent[calculatorName]["commitment-type"];
      if (paymentType === undefined) {
        return "pay-as-you-use";
      } else {
        return paymentType.value;
      }
    },
    hasComponent(items, key) {
      let itemComponent = false;

      for (const item of items) {
        if (item.data_type === key || item.slug === key) itemComponent = true;
      }

      return itemComponent;
    },
    getComponentIndex(items, key) {
      let componentIndex = -1;

      for (const [index, item] of items) {
        if (item.data_type === key) componentIndex = index;
      }

      return componentIndex;
    },
    filterComponent(items, key, filter, action) {
      let filteredItems = filter;
      let filtered = items.filter((item) => {
        if (action == "exclude") {
          switch (key) {
            case "data_type":
              return !filteredItems.includes(item.data_type);

            case "data_group":
              return !filteredItems.includes(item.data_group);

            case "slug":
              return !filteredItems.includes(item.slug);

            default:
              return true;
          }
        } else {
          switch (key) {
            case "data_type":
              return filteredItems.includes(item.data_type);

            case "data_group":
              return filteredItems.includes(item.data_group);

            case "slug":
              return filteredItems.includes(item.slug);

            default:
              return true;
          }
        }
      });

      return filtered;
    },
    filterChildComponent(items, key, filter) {
      let filtered = items.filter((item) => {
        switch (key) {
          case "data_type":
            return filter.includes(item.data_type);

          case "data_group":
            return filter.includes(item.data_group);

          case "slug":
            return item.slug.includes(filter);

          default:
            return true;
        }
      });

      return filtered[0];
    },
    getComponentItem(items, data_type) {
      let compomentItem = [];
      for (const item of items) {
        if (item.data_type === data_type) compomentItem = item;
      }

      return compomentItem;
    },
    updateQuantity(product, itemSlug, val) {
      this.modelComponent[product][itemSlug]["value"] = val;
    },
    switchChild(event, product, parentItem) {
      if (event.target.options.selectedIndex > -1) {
        const theTarget =
          event.target.options[event.target.options.selectedIndex].dataset;
        let selectedSlug = theTarget.slug;
        this.setListChildVisible(product, parentItem, selectedSlug);
      }
    },
    resetValue(product) {
      for (const componentIndex in this.calculatorItems[product][
        "calculator_component"
      ]) {
        let slug =
          this.calculatorItems[product]["calculator_component"][componentIndex][
            "slug"
          ];

        if (
          this.calculatorItems[product]["calculator_component"][componentIndex][
            "data_type"
          ] === "server_quantity"
        )
          this.modelComponent[product]["quantityName"] = slug;

        if (
          this.calculatorItems[product]["calculator_component"][componentIndex][
            "data_type"
          ] === "server_name"
        )
          this.modelComponent[product]["server-name"] =
            this.calculatorItems[product]["calculator_component"][
              componentIndex
            ];

        // if(slug !== 'flavor'){
        this.modelComponent[product][slug] =
          this.calculatorItems[product]["calculator_component"][componentIndex];
        this.modelComponent[product][slug]["subtotal"] = 0;

        if (
          this.modelComponent[product][slug]["data_type"] == "integer" ||
          this.modelComponent[product][slug]["data_type"] ==
            "integer-free-input" ||
          this.modelComponent[product][slug]["data_type"] == "server_quantity"
        ) {
          this.modelComponent[product][slug]["value"] =
            this.modelComponent[product][slug]["rule_min_value"];
        } else if (
          this.modelComponent[product][slug]["data_type"] == "boolean"
        ) {
          this.modelComponent[product][slug]["value"] = false;
        } else if (
          this.modelComponent[product][slug]["data_type"] == "list" ||
          this.modelComponent[product][slug]["data_type"] == "commitment-type"
        ) {
          this.modelComponent[product][slug]["value"] =
            this.modelComponent[product][slug]["list_items"][0]["slug"];
        } else if (
          this.modelComponent[product][slug]["data_type"] == "list-full" ||
          slug == "flavor" ||
          this.modelComponent[product][slug]["data_type"] == "list-with-child"
        ) {
          this.modelComponent[product][slug]["value"] = 0;
        } else {
          this.modelComponent[product][slug]["value"] = "";
        }

        if (
          this.modelComponent[product][slug]["data_group"] !== null &&
          this.modelComponent[product][slug]["data_group"].includes("list-")
        ) {
          this.modelComponent[product][slug]["visible"] = false;
        } else {
          this.modelComponent[product][slug]["visible"] = true;
        }
        // }
      }

      this.selectedFlavor = '';
      this.setListChildVisible(product);
    },
    setListChildVisible(product, parent = null, parentSelectedItem = null) {
      if (parent === null) {
        let calComponents =
          this.calculatorItems[product]["calculator_component"];
        let parentComponents = this.filterComponent(
          calComponents,
          "data_type",
          ["list-with-child"],
          "include"
        );

        for (const componentIndex in parentComponents) {
          let childComponents = this.filterComponent(
            calComponents,
            "data_group",
            ["list-" + parentComponents[componentIndex]["slug"]],
            "include"
          );
          let selectedComponent = this.filterChildComponent(
            childComponents,
            "slug",
            parentComponents[componentIndex]["list_items"][0]["slug"]
          );
          let selectedComponentSlug = selectedComponent["slug"];

          this.modelComponent[product][selectedComponentSlug]["visible"] = true;
        }
      } else {
        let calComponents =
          this.calculatorItems[product]["calculator_component"];
        let parentComponents = parent;

        let childComponents = this.filterComponent(
          calComponents,
          "data_group",
          ["list-" + parentComponents.slug],
          "include"
        );
        for (const childIndex in childComponents) {
          this.modelComponent[product][childComponents[childIndex]["slug"]][
            "visible"
          ] = false;
          this.modelComponent[product][childComponents[childIndex]["slug"]][
            "value"
          ] = 0;
        }

        let selectedComponent = this.filterChildComponent(
          childComponents,
          "slug",
          parentSelectedItem
        );
        let selectedComponentSlug = selectedComponent["slug"];
        this.modelComponent[product][selectedComponentSlug]["visible"] = true;
      }
    },
    changeFlavor(event, product) {
      let selectedIndex = -1
      console.log(this.modelComponent[product]["flavor"]["list_items"]);
      for(const item of this.modelComponent[product]["flavor"]["list_items"]){
        ++selectedIndex;
        if(item.name === this.selectedFlavor){
          break;
          console.log(item, this.selectedFlavor, selectedIndex);
        }
      }

      // let dataset = event.target.options[selectedIndex].dataset;]
      this.modelComponent[product]['flavor']['value'] = selectedIndex
      this.changeFlavorByIndex(selectedIndex, product);
      
    },
    changeFlavorByIndex(key, product){
      let selectedPackage = this.modelComponent[product]["flavor"]["list_items"][key];

      let packageComponent = selectedPackage.package_component;
      console.log(this.modelComponent[product]["flavor"]["list_items"])
      console.log(key, selectedPackage)

      for (const componentItem in packageComponent) {
        let currentComponent = packageComponent[componentItem];
        this.modelComponent[product][currentComponent.title].value = currentComponent.value;
      }
    },
    getDirectCalculator() {
      var url_string = window.location.href; //window.location.href
      var url = new URL(url_string);
      let directCalculator = url.searchParams.get("calculator");
      let directFlavor = url.searchParams.get("package");

      if (
        directCalculator !== "" &&
        directCalculator !== null &&
        directCalculator !== undefined
      ) {
        if (this.modelComponent[directCalculator] !== undefined) {
          this.selectedTab = directCalculator;
          this.selectedMenu = directCalculator;

          let directCalculatorPackage =
            this.modelComponent[directCalculator]["flavor"]["list_items"];

          for (const packageIndex in directCalculatorPackage) {
            if (directCalculatorPackage[packageIndex]["name"] == directFlavor) {
              this.changeFlavorByIndex(packageIndex, directCalculator);
              this.modelComponent[directCalculator]["flavor"]["value"] =
                packageIndex;
            }
          }
        }
      }
    },
    getComponentValue(components, title, withUnit){
      for(const item of components){
        if(item.title === title){
          if(withUnit)
            return item.value
          else
            return `${item.value} ${item.unit}`
        }
      }
    }
  },
  created: function () {
    axios.get("../api/product-categories").then((response) => {
      this.productCategories = response.data.data;
      this.selectedCategory = this.productCategories[0].category_slug;
      this.selectedTab = this.productCategories[0].products[0].slug;
      this.selectedMenu = this.productCategories[0].products[0].slug;

      // const queryString = window.location.search;
      // const urlParams = new URLSearchParams(queryString);

      // if(urlParams.get('product') !== null){
      // 	this.selectedTab = urlParams.get('product');
      // 	this.selectedMenu = urlParams.get('product');
      // 	console.log(urlParams.get('product'));
      // }
    });

    axios.get("../api/calculator").then((response) => {
      this.calculatorItems = response.data.data;
      let calculators = response.data.data;

      for (const calIndex in calculators) {
        // let calComponent = calculators[calIndex].calculator_component;

        this.calculatorItems[calIndex].calculator_component.push({
          name: "flavor",
          slug: "flavor",
          list_items: calculators[calIndex].packages,
          value: "",
          data_group: null,
          data_type: "flavor",
        });

        this.modelComponent[calIndex] = {};
        this.modelComponent[calIndex].quantityName = "quantity";
        this.modelComponent[calIndex].editMode = false;
        this.modelComponent[calIndex].cartIndex = -1;
        this.modelComponent[calIndex].flavor = {};
        this.modelComponent[calIndex].flavor_group = calculators[calIndex].packageGroup;
        this.modelComponent[calIndex].flavor.list_items =
          calculators[calIndex].packages;
        this.modelComponent[calIndex].flavor.value = "";

        this.resetValue(calIndex);
      }

      this.getDirectCalculator();
    });
  },
};
</script>

