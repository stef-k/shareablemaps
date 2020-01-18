export default class Landing {

    constructor() {
        $('#searchMaps').autoComplete({
            resolver: 'custom',
            minLength: 1,
            events: {
                search: function (qry, callback) {
                    // let's do a custom ajax call
                    $.ajax(
                        '/api/v1/places-filtered', {
                            data: {
                                'term': qry
                            }
                        }
                    ).done(function (res) {
                        callback(res)
                    });
                }
            }
        });
    }

    setupEventListeners() {
        this.searchMaps()
        this.clearFilter()
        this.bootstrap()
        this.filterByTag()
    }

    maptileTpl(data) {
        let start = ``
        let mid = ``
        let end = ``
        start = `<div class="col-md-6 col-sm-12 mt-4 maptileParent">
        <div class="card">
            <div class="card-header bg-primary text-white mapname" data-mapname="${data.name}">${data.name}
            <button type="button" class="btn btn-link float-right text-white btn-sm"
            title="Click to learn about the map symbols" data-toggle="modal" data-target="#mapLegend">
            <i class="fa fa-info-circle" aria-hidden="true"></i>  Map Legend </button>
            </div>
            <iframe src="${data.url}" class="maptile"></iframe>
            <div class="card-body normal-text">Tags: `

        data.tags.forEach((tag) => {
            mid += ` <span class="badge badge-info tag-filter tag-filter-badge"
                data-tagname="${tag.name}" title="Filter maps by this tag">${tag.name}</span> `
        })

        end = `<br>
            <span>Suggested Days: <strong>${ data.suggested_days }</strong></span>
            <br>
            <span class="text-muted h6" >Updated at: ${ new Date(data.updated_at).toLocaleDateString() }</span>
            <hr>
            <p class="card-text">${data.details}</p>
        </div>
        <div class="card-footer text-muted">
            <a href="#" class="card-link socialShare" title="Share this map on social media" data-toggle="modal" data-target="#${data.name + data.id}">
            <i class="fa fa-share-alt" aria-hidden="true"></i>
            Share</a>
            <a href="${data.url.replace('embed', 'viewer')}" data-fullscreenlink="${data.url.replace('embed', 'viewer')}"
            class="card-link float-right fullScreenLink"
            title="Open the map in a new tab - full page" target="_blank">
            <span class="text-info"><i class="fa fa-window-maximize" aria-hidden="true"></i> Open Full Screen</span></a>
        </div>
    </div>
</div>

<div class="modal fade socialShareModal"  tabindex="-1" role="dialog" aria-labelledby="socialShareModal" aria-hidden="true" id="${data.name + data.id}">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Share <span class="text-info">${data.name}</span> travel map in social media</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <a href="https://www.facebook.com/sharer.php?u=https%3A%2F%2Fshareablemaps.com/maps/${data.id}" title="Share on Facebook" target="_blank" class="x2 text-muted">
      <i class="fa fa-facebook" aria-hidden="true"> <span class="x1quarter">Share on Facebook</span></i>
      </a>
      <br>
      <a href="https://twitter.com/intent/tweet?url=https%3A%2F%2Fshareablemaps.com/maps/${data.id}&text=${data.name} travel map by Shareable Maps
      " title="Share on Twitter" target="_blank" class="x2 text-muted">
      <i class="fa fa-twitter" aria-hidden="true"> <span class="x1quarter">Share on Twitter</span></i>
      </a>
      <br>
      <a href="https://www.reddit.com/submit?url=https%3A%2F%2Fshareablemaps.com/maps/${data.id}&title=${data.name} travel map by Shareable Maps" title="Share on Reddit" target="_blank" class="x2 text-muted">
      <i class="fa fa-reddit" aria-hidden="true"> <span class="x1quarter">Share on Reddit</span></i>
      </a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
`
        return `${start} ${mid} ${end}`
    }

    async bootstrap() {
        try {
            const response = await axios.get(`${window.shareablemaps.APP_URL}/api/v1/maps`)
            let content = ``
            response.data.forEach(entry => {
                content += this.maptileTpl(entry)
            })
            $('#maptiles').html(content)
        } catch (error) {
            window.shareablemaps.swal.fire({
                icon: 'error',
                title: 'Data Load Error',
                text: error
            })
        }
    }

    searchMaps() {
        $('#searchMaps').on('autocomplete.select', (e) => {
            if (e.target.value.length > 0) {
                axios.get(`${window.shareablemaps.APP_URL}api/v1/filter-places/${e.target.value}`)
                    .then((response) => {
                        let content = ``
                        response.data.forEach(entry => {
                            content += this.maptileTpl(entry)
                        })
                        $('#maptiles').html(content)
                    })
                    .catch((error) => {
                        window.shareablemaps.swal.fire({
                            icon: 'error',
                            title: 'Data Load Error',
                            text: error
                        })
                    })
                $('.clearFilter').removeClass('btn-primary').addClass('btn-info')
            }
        })
    }

    filterByTag() {
        $('body').on('click', '.tag-filter', (e) => {
            e.preventDefault()

            let tag = $(e.target).data('tagname')
            axios.get(`${window.shareablemaps.APP_URL}api/v1/filter-places/${tag}`)
                .then((response) => {
                    let content = ``
                    response.data.forEach(entry => {
                        content += this.maptileTpl(entry)
                    })
                    $('#maptiles').html(content)
                    $('.clearFilter').removeClass('btn-primary').addClass('btn-info')
                })
                .catch((error) => {
                    window.shareablemaps.swal.fire({
                        icon: 'error',
                        title: 'Data Load Error',
                        text: error
                    })
                })
        })
    }

    clearFilter() {
        $('.clearFilter').click((e) => {
            $('#searchMaps').val('')
            this.bootstrap()
            $('.clearFilter').removeClass('btn-info').addClass('btn-primary')
        })
    }
}
