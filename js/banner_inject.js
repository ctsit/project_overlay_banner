$(document).ready(function() {
    $("body").prepend(`<div id='project-overlay-banner'> ${project_overlay_banner_text}</div>`);

    $("#project-overlay-banner").click(function() {
        $(this).hide();
    });
    
});
