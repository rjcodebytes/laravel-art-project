import * as Jodit from 'jodit';
import 'jodit/es5/jodit.min.css';

document.addEventListener('DOMContentLoaded', () => {
    const textarea = document.getElementById('editor');

    if (textarea) {
        new Jodit.Jodit(textarea, {
            height: 400,
            uploader: { insertImageAsBase64URI: true },
            toolbarAdaptive: false,
            buttons: [
                'bold', 'italic', 'underline', '|',
                'ul', 'ol', '|',
                'link', 'image', 'video', '|',
                'align', 'left', 'center', 'right', '|',
                'undo', 'redo', '|', 'source'
            ],
            removeButtons: ['about'],
            placeholder: 'Write your blog content here...',
        });
    }
});
