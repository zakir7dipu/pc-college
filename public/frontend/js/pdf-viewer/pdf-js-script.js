$(function (){
    let viewportWidth = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    if (viewportWidth < 1100 && viewportWidth > 1000){
        viewportWidth = 1100
    }else if(viewportWidth < 1000 && viewportWidth > 900){
        viewportWidth = 1000
    }else if(viewportWidth < 900){
        viewportWidth = 900
    }
    let screenWidth = window.screen.width;
    let viewportScale = screenWidth / viewportWidth
    pdfjsLib.GlobalWorkerOptions.workerSrc = '/forntend/js/pdf-viewer/pdf.worker.min.js';
    PDFAnnotate("pdf-container", $('#pdf-container').attr('data-src'), {
        scale: viewportScale,
    });
});
