<template>
    <div>
        <nav aria-label="paginate">
            <ul class="pagination pagination-sm" v-if="resource.last_page > 1">
                <li class="page-item" v-if="current_page">
                    <a class="page-link" href="#" @click.prevent="loadingItems(resource.current_page -1)">{{ '<<' }}</a>
                </li>

                <li :class="['page-item', { 'active': resource.current_page == page }]" aria-current="page"
                    v-for="page in resource.last_page" :key="page.id">
                    <a class="page-link" href="#" @click.prevent="loadingItems(page)">{{ page }}</a>
                </li>

                <li class="page-item" v-if="resource.current_page < resource.last_page">
                    <a class="page-link" href="#" @click.prevent="loadingItems(resource.current_page +1)">{{ '>>' }}</a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>

export default {
    name:'Paginate',
    props:['last_page', 'current_page', 'preview', 'next', 'resource', 'loadingItems']

}
</script>
