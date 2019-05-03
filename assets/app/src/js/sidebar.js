var sidebar = {
    init: function() {
        $('#sidebarCollapse').on('click', this.show);
        $('#sidebar-dismiss, .sidebar-overlay').on('click', this.hide);
    },
    show: function() {
        $('.sidebar-wrap').addClass('active');
    },
    hide: function() {
        $('.sidebar-wrap').removeClass('active');
    }
};

sidebar.init();
