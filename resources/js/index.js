import {marked} from 'marked';

const editor = document.getElementById("editor");
const preview = document.getElementById("preview");
editor.addEventListener("input",function(){
    marked.setOptions({
        langPrefix:"",
        breaks: true,
        sanitize: true,
    })
    preview.innerHTML = marked.parse(this.value);
});