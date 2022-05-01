<script src="views/scripts/fancyTable.min.js"></script>
<script>
$(document).ready(function(){
	$('.tabla_filtrable').fancyTable({
		//sortColumn: 0,
		//sortOrder: 'asc',
		sortable: true,
		pagination: true,
		searchable: true,
		globalSearch: true,
		paginationClass: '',
		paginationClassActive: 'active',
		pagClosest: 3,
		perPage: 300,
		inputStyle: '',
		inputPlaceholder: 'Buscar...',
	});
});
</script>