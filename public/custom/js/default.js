function sidebarActive(id) {
    $('#' + id).addClass('active')
    $('#' + id).parents('.nav-item').addClass('menu-open')
    $('#' + id).parents('ul').first().siblings('.nav-link').addClass('active')
}