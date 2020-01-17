export class MapEditor {

    constructor() {
        this.editor = document.querySelector('.ql-editor')
        this.swal = window.shareablemaps.swal
    }

    addEventListeners() {
        if ($('#editor').length) {
            this.setEditorContent()
            this.bootstrapAutoComplete()
            this.addNewTagField()
            this.deleteTag()
            this.saveMap()
        }
        this.deleteMap()
    }

    bootstrapAutoComplete() {
        $('.tag-autocomplete').autoComplete({
            resolverSettings: {
                url: '/api/v1/tags'
            },
            minLength: 1,
        });
    }

    setEditorContent() {
        let content = $('#editorContent').val()
        this.editor.innerHTML = content
    }

    addNewTagField() {
        let newTagField = document.querySelector('.addTagField')
        if (newTagField) {
            newTagField.onclick = () => {
                let tpl = `                    <div class="col-lg-3 col-sm-12 tagCol">
                <input type="text" class="form-control form-control-lg tag-autocomplete"
                    placeholder="Type a new tag" autocomplete="off" name="tags[]">
                <button type="button" class="btn btn-danger btn-sm m-2 deleteTag"
                    title="Delete this tag from the current map" data-tagid="null" data-tagname="null">Delete tag</button>
            </div>`
                let parent = document.querySelectorAll('.tagCol')
                parent[parent.length - 1].insertAdjacentHTML('afterend', tpl)
                this.bootstrapAutoComplete()
            }
        }
    }

    deleteTag() {
        $('.deleteTag').click((e) => {
            e.preventDefault()
            // post tag deletion

            this.swal.fire({
                title: 'Really delete Tag?',
                text: `Do you really want to delete the ${$(e.target).data('tagname')} with ID: ${$(e.target).data('tagid')} ???`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'DELET TAG!'
            })
            .then((result) => {
                if (result.value) {
                    axios.post(`${window.shareablemaps.APP_URL}/admin/tags/${$(e.target).data('tagid')}/delete`)
                    .then((response) => {
                        this.swal.fire({
                            title: 'Deleted!',
                            icon: 'success',
                            text: 'The tag has been deleted'
                        })
                        .then(() => {
                            window.location.reload()
                        })
                    })
                }
            })
        })
    }

    deleteMap() {
        $('.deleteMap').click((e) => {
            e.preventDefault()

            this.swal.fire({
                title: 'Really delete Map?',
                text: `Do you really want to delete the ${$(e.target).data('mapname')} map with ID: ${$(e.target).data('mapid')} ???`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'DELET MAP!'
            }).then((result) => {
                if (result.value) {
                    // Do the API call here for map deletion...
                    axios.post(`${window.shareablemaps.APP_URL}/admin/maps/${$(e.target).data('mapid')}/delete`)
                        .then((response) => {
                            this.swal.fire({
                                title: 'Deleted!',
                                text: 'The map has been deleted',
                                icon: 'success'
                            }).then(() => {
                                // redirect to mapslist
                                window.location = `${window.shareablemaps.APP_URL}/admin/mapslist`
                            })
                        })
                        .catch((error) => {
                            this.swal.fire({
                                icon: 'error',
                                text: error
                            })
                        })
                }
            })
        })
    }

    async saveMap() {
        $('#saveMap').click((e) => {
            e.preventDefault()
            let content = this.editor.innerHTML
            let serialized = $('.editMapForm').serialize()
            serialized += `&details=${content}`

            axios.post(`${window.shareablemaps.APP_URL}/admin/maps/${$('#id').val()}/save`, serialized)
                .then((response) => {
                    this.swal.fire({
                        icon: 'success',
                        text: response.data
                    })
                    .then(() => {
                        window.location.reload()
                    })
                })
                .catch((error) => {
                    window.shareablemaps.swal.fire({
                        icon: 'error',
                        text: error
                    })
                })
        })
    }
}
