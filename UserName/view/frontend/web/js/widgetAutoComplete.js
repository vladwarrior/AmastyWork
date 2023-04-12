define(['jquery'], function ($) {
    $.widget('myspace.testAutoComplete', {
        options:{
            minChars:null,
            availableSku: [
                '2444-MB',
                '2445-UM',
                '2433-AU',
                '2555-BB'],
            searchResultList: null},
        _create: function () {
            $(this.element).find('#test-search-input').on('keyup', this.processAutocomplete.bind(this));
            this.options.searchResultList = $(this.element).find('.search-result-list');
            },
        processAutocomplete: function (event) {
                var queryText = $(event.target).val();
                this.options.searchResultList.empty();

             if (queryText.length >= this.options.minChars) {
            //     $.getJSON(
            //         this.options.searchUrl,
            //         {
            //             q: queryText
            //         }, function (data) {
            //             console.log("fvdf");
            //             if (data.length) {
            //                 var searchList = data.map(function (item) {
            //                     return $("<li/>").text(item.title);
            //                 });
            //
            //                 this.options.searchResultList.append(searchList);
            //             } else {
            //                 this.options.searchResultList.empty();
            //             }
            //         }.bind(this)
            //     );

                    var filteredSkus = this.options.availableSku.filter(function (item){
                        return item.indexOf(queryText) !== -1;
                    })

                    if (filteredSkus.length) {
                        var searchList = filteredSkus.map(function (item) {
                            return $('<li/>').text(item);
                        });

                        this.options.searchResultList.append(searchList);
                    } else {
                        this.options.searchResultList.empty();
                    }
                    console.log(filteredSkus)
                }
        }
    });

    return $.myspace.testAutoComplete;
})