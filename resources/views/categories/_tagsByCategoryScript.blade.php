<script>
	
	// foreach each tag category given activate the select2 plugin
for (var i = {{ $tagCategories->pluck('id') }}.length - 1; i >= 0; i--) {
	
	var tagListId = '#tag_list_' + {{ $tagCategories->pluck('id') }}[i];

	$(tagListId).select2({
		placeholder: "Select some tags",
		allowClear: true	
	});
}

</script>