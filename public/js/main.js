function initAjaxListSearch(search_id, table_id, paginationId, baseUrl, pageUrl) {
    if (search_id) {
        let flag = false;
        let timer = null;

        $(document).on('keyup', '#' + search_id, function(e) {
            flag = false;
            clearTimeout(timer);
            timer = null;
        });

        $(document).on('keyup', '#' + search_id, function(e) {
            flag = true;

            timer = setTimeout(() => {
                if (flag) {
                    let str = $(this).val();
            
                    if (str.length > 1 || str.length == 0) {
                        let ajax_url = baseUrl + pageUrl + '?search=' + str;
            
                        $.get(ajax_url, function(data) {
                            $('#' + table_id).html(data);
                        });
                    }
                }
            }, 1000);
        });
    }

    $(document).on('click', '#' + paginationId + ' a', function(e) {
        e.preventDefault();

        let href = $(this).attr('href');
        let patt = /\?page=(\d+)/i;
        let page = patt.exec(href);
        let search = '';

        if (search_id) search = '&search=' + $('#' + search_id).val();

        let ajax_url = baseUrl + pageUrl + '?page=' + page[1] + search;

        $.get(ajax_url, function(data) {
            $('#' + table_id).html(data);
        });
    });
}