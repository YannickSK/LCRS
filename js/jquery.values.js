$(function () {
    'use strict';

    var Instances = ['ICC25HC', 'RS25HC'];
    var TrinketList = ['AA (GSB)', 'CTS', 'DBW', 'DFO', 'GTS', 'POTNL', 'PTS', 'STS', 'TAIJ'];
    var WeaponList = ['Archus\' Greatstaff', 'Havoc\'s Call', 'Heaven\'s Fall', 'Glorenzelg', 'Fal\'inrush', 'Mithrios', 'Oathbinder', 'Scepter', 'Shadowmourne'];    var Trinkets = $.map(TrinketList, function (ItemList) { return { value: ItemList, data: { category: 'Trinkets' }}; });
    var Weapons = $.map(WeaponList, function (ItemList) { return { value: ItemList, data: { category: 'Weapons' } }; });
    var ItemList = Trinkets.concat(Weapons);

    // Initialize autocomplete with local lookup:
    $('#form_itemname').devbridgeAutocomplete({
        lookup: ItemList,
        minChars: 1,
        onSelect: function (suggestion) {
            $('#selection').html('You selected: ' + suggestion.value + ', ' + suggestion.data.category);
        },
        showNoSuggestionNotice: true,
        noSuggestionNotice: 'Sorry, no matching results',
        groupBy: 'category'
    });
    
    // Initialize autocomplete with custom appendTo:
    $('#form_instance').autocomplete({
        lookup: Instances
    });
});