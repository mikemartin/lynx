<template>
    <data-list :visible-columns="columns" :columns="columns" :rows="rows">
        <div class="card p-0" slot-scope="{ filteredRows: rows }">
            <data-list-table>
                <template slot="cell-title" slot-scope="{ row: link }">
                    {{ link.title }}
                </template>
                <template slot="cell-link" slot-scope="{ row: link }">
                    <span class="badge-pill-sm">bit.ly/<span class="font-bold">{{ link.back_half }}</span></span>
                </template>
                <template slot="cell-url" slot-scope="{ row: link }">
                    <span class="font-mono text-2xs">{{ link.url }}</span>
                </template>
                <template slot="actions" slot-scope="{ row: link, index }">
                    <dropdown-list>
                        <dropdown-item :text="__('Copy')" @click.stop.prevent="copyLink(link)">
                            <input type="hidden" :value="link.link" class="clipboard-link"/>
                        </dropdown-item>
                        <dropdown-item
                            v-if="link.deleteable"
                            :text="__('Delete')"
                            class="warning"
                            @click="$refs[`deleter_${link.id}`].confirm()"
                        >
                            <resource-deleter
                                :ref="`deleter_${link.id}`"
                                :resource="link"
                                @deleted="removeRow(link)">
                            </resource-deleter>
                        </dropdown-item>
                    </dropdown-list>
                </template>
            </data-list-table>
        </div>
    </data-list>
</template>

<script>
export default {
    props: ['links'],
    data() {
        return {
            rows: this.links,
            columns: [
                { field: 'title', label: __('Title') },
                { field: 'link', label: __('Link') },
                { field: 'url', label: __('URL') },
                { field: 'created_at', label: __('Created') },
            ]
        }
    },
    methods: {
        copyLink (link) {
          let linkToCopy = document.querySelector('.clipboard-link')
          linkToCopy.setAttribute('type', 'text')
          linkToCopy.select()

          try {
            var successful = document.execCommand('copy');
            this.$toast.success(__('Bitly link copied'));
          } catch (err) {
            this.$toast.error(__('Unable to copy link'));
          }
          linkToCopy.setAttribute('type', 'hidden')
          window.getSelection().removeAllRanges()
        },
    },
}
</script>