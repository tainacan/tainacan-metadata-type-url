<template>
    <div v-if="itemMetadatum">
        <b-input
            :disabled="disabled"
            :id="
            itemMetadatum.metadatum.metadata_type_object.component +
            '-' +
            itemMetadatum.metadatum.slug
            "
            :value="value"
            @input="onInput($event)"
            @blur="onBlur"
            type="number"
            lang="en"
            :step="getStep"
        />
        <!-- <some-third-party-component /> -->
  </div>
</template>

<script>
// import SomeThirdPartyComponent from "some-third-party-component";

export default {
  name: "TainacanMetadataTypeURL",
  components: {
    // SomeThirdPartyComponent,
  },
  props: {
    itemMetadatum: Object,
    value: [String, Number, Array],
    disabled: false,
  },
  computed: {
    getStep: function () {
      if (
        this.itemMetadatum &&
        this.itemMetadatum.metadatum.metadata_type_options &&
        this.itemMetadatum.metadatum.metadata_type_options.step
      )
        return this.itemMetadatum.metadatum.metadata_type_options.step;
      else return 0.01;
    },
  },
  methods: {
    onInput: function (value) {
      this.$emit("input", value);
    },
    onBlur: function () {
      this.$emit("blur");
    },
  },
};
</script>

<style>
/* How about some custom style here? */
</style>
