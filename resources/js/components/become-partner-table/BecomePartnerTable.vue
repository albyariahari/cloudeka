<template>
  <div>
    <div class="partner--program--btn--wrapper">
      <button
        class="btn btn-grey-light partner--program--btn"
        id="resellerBtn"
        @click="activeContent = 'reseller'"
      >
        Reseller Tier
      </button>
      <button
        class="btn btn-gradient text-white partner--program--btn"
        @click="activeContent = 'wholesales'"
      >
        Wholesales Tier
      </button>
    </div>

    <div class="mt-5">
      <div v-if="activeContent === 'reseller'">
        <h5>What is Reseller Tier ?</h5>
        <p>
          Program supported by Cloudeka to offer Tier Mapping (Register, Gold,
          Platinum level) by Partner which act as Reseller.
        </p>

        <div class="table-responsive">
          <table class="table partner--table">
            <thead class="partner--table--head">
              <tr>
                <td>Reseller Requirement</td>
                <td>Cloudeka Register Partner</td>
                <td>Cloudeka Gold Partner</td>
                <td>Cloudeka Platinum Partner</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Join Cloudeka Partner Program</td>
                <td>Mandatory</td>
                <td>Mandatory</td>
                <td>Mandatory</td>
              </tr>
              <tr>
                <td>Cloudeka Sales Fundamental Certification</td>
                <td>-</td>
                <td>2</td>
                <td>4</td>
              </tr>
              <tr>
                <td>Cloudeka Technical Certification</td>
                <td>-</td>
                <td>2 Associate, 1 Professional</td>
                <td>3 Associate, 2 Professional</td>
              </tr>
              <tr>
                <td>Launched Opportunity*</td>
                <td>-</td>
                <td>>= Rp 50.000.000/MRR</td>
                <td>>= Rp 100.000.000/MRR</td>
              </tr>
              <tr>
                <td>Deal Registration</td>
                <td>Mandatory</td>
                <td>Mandatory</td>
                <td>Mandatory</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="terms--condition--description mt-3">
          <h6>Term & Condition :</h6>
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
        <h5>What is Wholesales Tier ?</h5>
        <p>
          Program supported by Cloudeka to offer Tier Mapping (Register, Gold,
          Platinum level) by Partner which act as Reseller.
        </p>

        <div class="table-responsive">
          <table class="table partner--table">
            <thead class="partner--table--head">
              <tr>
                <td>Reseller Requirement</td>
                <td>Cloudeka Register Partner</td>
                <td>Cloudeka Gold Partner</td>
                <td>Cloudeka Platinum Partner</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Join Cloudeka Partner Program</td>
                <td>Mandatory</td>
                <td>Mandatory</td>
                <td>Mandatory</td>
              </tr>
              <tr>
                <td>Cloudeka Sales Fundamental Certification</td>
                <td>-</td>
                <td>2</td>
                <td>4</td>
              </tr>
              <tr>
                <td>Cloudeka Technical Certification</td>
                <td>-</td>
                <td>2 Associate, 1 Professional</td>
                <td>3 Associate, 2 Professional</td>
              </tr>
              <tr>
                <td>Launched Opportunity*</td>
                <td>-</td>
                <td>>= Rp 50.000.000/MRR</td>
                <td>>= Rp 100.000.000/MRR</td>
              </tr>
              <tr>
                <td>Deal Registration</td>
                <td>Mandatory</td>
                <td>Mandatory</td>
                <td>Mandatory</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="terms--condition--description mt-3">
          <h6>Term & Condition :</h6>
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