<template>
    <div v-if="itemMetadatum">
        <b-input
            :disabled="disabled"
            :id="'tainacan-item-metadatum_id-' + itemMetadatum.metadatum.id + (itemMetadatum.parent_meta_id ? ('_parent_meta_id-' + itemMetadatum.parent_meta_id) : '')"
            :value="value"
            @input="onInput($event)"
            @blur="onBlur"
            type="url"
        />
  </div>
</template>

<script>

export default {
  name: "TainacanMetadataTypeURL",
  props: {
    itemMetadatum: Object,
    value: [String, Number, Array],
    disabled: false,
  },
  methods: {
    onInput(value) {
      this.$emit("input", value);
    },
    onBlur() {
      this.$emit("blur");
    },
  },
};
</script>