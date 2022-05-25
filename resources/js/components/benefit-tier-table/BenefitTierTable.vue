<template>
  <div>
    <div class="partner--program--btn--wrapper">
      <button
        class="btn btn-grey-light partner--program--btn"
        id="resellerBtn"
        @click="activeContent = 'reseller'"
      >
        Reseller Benefit
      </button>
      <button
        class="btn btn-gradient text-white partner--program--btn"
        @click="activeContent = 'wholesales'"
      >
        Wholesales Benefit
      </button>
    </div>

    <div class="mt-5 text-white">
      <div v-if="activeContent === 'reseller'">
        <div class="table-responsive">
          <table class="table partner--table">
            <thead class="partner--table--head">
              <tr>
                <td></td>
                <td>Register</td>
                <td>Gold</td>
                <td>Platinum</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="font-weight-bold">Education Insight</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Partner Report</td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
              </tr>
              <tr>
                <td>Partner Product Enablement</td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
              </tr>
              <tr>
                <td class="font-weight-bold">Recognition & Award</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Promotional Offer</td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
              </tr>
              <tr>
                <td>Cloudeka Partner Badge</td>
                <td></td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
              </tr>
              <tr>
                <td>Cloudeka Rebate Program*</td>
                <td></td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
              </tr>
              <tr>
                <td>GTM & Event</td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="mt-5">
          <h5>Term & Condition :</h5>
          <li>
            Monitoring Quarterly by Cloudeka for partner status and launched
            opportunity.
          </li>
          <li>
            Technical and administration will fullfill by partner considering to
            upgrade level Partner.
          </li>
          <li>Target launched Opportunity will impact to Rebate program.</li>
          <li>
            Each Partner will get special discount level for Deka Flexi related
            on Tier Partner level.
          </li>
        </div>
      </div>

      <div v-else>
        <div class="table-responsive">
          <table class="table partner--table">
            <thead class="partner--table--head">
              <tr>
                <td></td>
                <td>Register</td>
                <td>Gold</td>
                <td>Platinum</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="font-weight-bold">Education Insight</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Partner Report</td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
              </tr>
              <tr>
                <td>Partner Product Enablement</td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
              </tr>
              <tr>
                <td class="font-weight-bold">Recognition & Award</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Promotional Offer</td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
              </tr>
              <tr>
                <td>Cloudeka Partner Badge</td>
                <td></td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
              </tr>
              <tr>
                <td>Cloudeka Rebate Program*</td>
                <td></td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
              </tr>
              <tr>
                <td>GTM & Event</td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
                <td>
                  <i class="fas fa-check"></i>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="mt-5">
          <h5>Term & Condition :</h5>
          <li>
            Monitoring Quarterly by Cloudeka for partner status and launched
            opportunity.
          </li>
          <li>
            Technical and administration will fullfill by partner considering to
            upgrade level Partner.
          </li>
          <li>Target launched Opportunity will impact to Rebate program.</li>
          <li>
            Each Partner will get special discount level for Deka Flexi related
            on Tier Partner level.
          </li>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      activeContent: "reseller",
    };
  },
};
</script>

<style>
</style>