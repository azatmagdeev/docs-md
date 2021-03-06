<?php

$filename = str_replace('/', '', $_SERVER['REDIRECT_URL']);

if (!file_exists($filename)) {
    echo '404 not found';
}

?>
<!doctype html>
<html lang=ru>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/showdown/dist/showdown.min.js"></script>
    <title>Document</title>
    <style>
        pre {
            background-color: grey;
            color: white;
            margin: .5em;
            padding: .5em;
        }

        textarea {
            width: 50vw;
            height: 90vh;
            overflow: scroll
        }

    </style>
</head>
<body>

<main style="display:flex;gap:1em">
    <div id="md-editor" style="display:none;width:50vw;height: 90vh">
        <label>
            <textarea id="editor" cols="30" rows="10"></textarea>
        </label>
    </div>
    <div id="md" style="height: 90vh;overflow: scroll"><?php echo file_get_contents($filename) ?></div>
</main>

<script>
    const md = document.getElementById('md')
    const converter = new showdown.Converter();

    const text = md.innerHTML
    md.innerHTML = converter.makeHtml(text)


    // (
    //     async function () {
    //         const md = document.getElementById('md')
    //         const converter = new showdown.Converter();
    //         // let text = '# hello, markdown!';
    //         let text = await (await fetch('index.md')).text()
    //         md.innerHTML = converter.makeHtml(text)
    //
    //         const mdEditor = document.getElementById('md-editor')
    //         const editor = document.getElementById('editor')
    //         const editButton = document.getElementById('edit')
    //         const saveButton = document.getElementById('save')
    //         const cancelButton = document.getElementById('cancel')
    //
    //         editButton.onclick = e => {
    //             mdEditor.style.display = 'block'
    //             editor.value = text
    //             editButton.style.display = 'none'
    //             saveButton.style.display = 'block'
    //             cancelButton.style.display = 'block'
    //         }
    //
    //         editor.oninput = e => {
    //             const newText = editor.value
    //             md.innerHTML = converter.makeHtml(newText)
    //         }
    //
    //         cancelButton.onclick = e => {
    //             editButton.style.display = 'block'
    //             saveButton.style.display = 'none'
    //             cancelButton.style.display = 'none'
    //             mdEditor.style.display = 'none'
    //             md.innerHTML = converter.makeHtml(text);
    //         }
    //
    //         saveButton.onclick = e => {
    //             editButton.style.display = 'block'
    //             saveButton.style.display = 'none'
    //             cancelButton.style.display = 'none'
    //             mdEditor.style.display = 'none'
    //             text = editor.value;
    //         }
    //     }
    // )()


</script>
</body>
</html>


