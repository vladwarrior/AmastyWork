// define(['uiComponent'], function (Component) {
//     return Component.extend({
//         defaults: {
//             searchText: '',
//             searchResult: [],
//             availableSku: [
//                 {sku: '2444-MB'},
//                 {sku: '2446-EU'},
//                 {sku: '1234-KL'}
//                 ]
//         },
//         initObservable: function () {
//             this._super();
//             this.observe(['searchText', 'searchResult']);
//
//             return this;
//         },
//         initialize: function () {
//             this._super();
//             this.searchText.subscribe(this.handleAutocomplete.bind(this));
//         },
//         handleAutocomplete: function (searchValue) {
//
//             if (searchValue.length >= 2) {
//                 var filteredSku = this.availableSku.filter(
//                     function (item) {
//                         return item.sku.indexOf(searchValue) !== -1;
//                     }
//                 );
//
//                 this.searchResult(filteredSku);
//             } else {
//                 this.searchResult([]);
//             }
//         }
//     });
// });


define(['uiComponent', 'jquery'], function (Component, $) {
    return Component.extend({
        defaults: {
            searchText: '',
            searchResult: [],
            minChars: 3
        },
        //устанавливаем наблюдение за searchText и searchResult
        initObservable: function () {
            this._super();
            this.observe(['searchText', 'searchResult']);
            return this;
        },
        //при изменении значения searchText - вызывается handleAutocomplete
        initialize: function () {
            this._super();
            this.searchText.subscribe(this.handleAutocomplete.bind(this));
        },
        handleAutocomplete: function (searchValue) {
            if (searchValue.length >= this.minChars) {
                var thiss = this;
                $.ajax({
                    url: '/mypage/usernameform/searchproduct',
                    data: {search_text: searchValue},
                    type: 'POST',
                    success: function (response) {
                        thiss.searchResult(response);
                    }
                });
            } else {
                this.searchResult([]);
            }
        }
    });
});