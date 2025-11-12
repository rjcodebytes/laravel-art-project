import './bootstrap';

// ✅ Correct for Jodit v4+
import 'jodit/es2021/jodit.min.css';
import Jodit from 'jodit/es2021/jodit.min.js';
import './jodit-blog-editor';

import Glide from '@glidejs/glide';
import '@glidejs/glide/dist/css/glide.core.min.css';
import '@glidejs/glide/dist/css/glide.theme.min.css';

document.addEventListener('DOMContentLoaded', () => {
    const textarea = document.querySelector('#editor');
    if (textarea) {
        const editor = new Jodit('#editor', {
            height: 500,
            toolbarAdaptive: false,
            toolbarSticky: true,
            spellcheck: true,
            language: 'en',
            uploader: { insertImageAsBase64URI: true },
            showCharsCounter: true,
            showWordsCounter: true,
            defaultMode: Jodit.MODE_WYSIWYG,
            buttons: [
                'source', '|',
                'bold', 'italic', 'underline', 'strikethrough', '|',
                'superscript', 'subscript', '|',
                'font', 'fontsize', 'brush', 'paragraph', '|',
                'ul', 'ol', 'outdent', 'indent', '|',
                'align', 'undo', 'redo', '|',
                'table', 'link', 'image', 'video', 'file', '|',
                'copyformat', 'cut', 'copy', 'paste', 'hr', '|',
                'fullsize', 'preview', 'print', 'about', 'selectall', 'find', '|',
                'brush', 'background', 'color', '|',
                'eraser'
            ]
        });
    }
});
