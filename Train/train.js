$(document).ready(function() {
    $('#horizontal').DataTable({
        "scrollX": true
    });

    $('#fixed-headers').scroll(function(ev) {
        /**
         * where the table scroll, change the position of header and first column
         */
        $('thead th').css('transform', 'translateY(' + this.scrollTop + 'px)');
        $('tbody th').css('transform', 'translateX(' + this.scrollLeft + 'px)');
    });
});