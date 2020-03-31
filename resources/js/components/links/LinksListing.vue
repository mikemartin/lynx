<template>
    <data-list :columns="columns" :sort="false" :rows="rows">
        <div class="card p-0" slot-scope="{ filteredRows: rows }">
            <data-list-table>
                <template slot="cell-title" slot-scope="{ row: link }">
                    <a :href="link.show_url">{{ link.title }}</a>
                </template>
                <template slot="actions" slot-scope="{ row: link, index }">
                    <dropdown-list>
                        <dropdown-item :text="__('Show')" :redirect="collection.show_url" />
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
            ]
        }
    }

}
</script>
