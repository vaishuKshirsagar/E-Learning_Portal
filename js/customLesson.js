$(document).ready(function(){
    $(function(){
        $("lessonPlaylist li").on("click" , function(){
            $("#lessonDisplay").attr({
                src:$(this).attr("../lessondata/ITR Project.pdf"),
            });
        });
        $("#lessonDisplay").attr({
            src:$("#lessonPlaylist li").eq(0).attr("data"),
        });
    });
});