import TomSelect from 'tom-select'
export default class extends window.Controller {
    connect () {
        const select = this.element.querySelector('select')

        let dataset = select.dataset
        let valueField = dataset.selectValuefield
        let labelField = dataset.selectLabelfield
        let searchField = dataset.selectSearchfield
        let loadThrottle = parseInt(dataset.selectDebounce)
        let minToSearch = dataset.selectMintosearch
        let remoteUrl = dataset.selectRemoteurl

        this.choices = new TomSelect(select, {
            itemClass: 'item',
            optionClass: 'option',
            valueField,
            labelField,
            searchField,
            loadThrottle,
            load: function (query, callback) {
                let value = this.input.tomselect.lastValue

                if (value.length >= parseInt(minToSearch)) {
                    var url = remoteUrl + encodeURIComponent(query)
                    fetch(url)
                        .then(response => response.json())
                        .then(json => {
                            if (json.items) {
                                callback(json.items)
                            } else {
                                callback()
                            }
                        })
                        .catch(() => {
                            callback()
                        })
                } else {
                    callback()
                }
            },

            render: {
                option: function (item, escape) {
                    return `<option value="${escape(
                        item[valueField]
                    )})">${escape(item[labelField])}</option>`
                },
                item: function (item, escape) {
                    return `<option value="${escape(
                        item[valueField]
                    )}">${escape(item[labelField])}</option>`
                },
                loading: function (data, escape) {
                    if (data.input.length >= parseInt(minToSearch)) {
                        return '<div class="spinner"></div>'
                    }
                },
                no_results: function (data, escape) {
                    if (data.input.length >= parseInt(minToSearch)) {
                        return (
                            '<div class="no-results">No results found for "' +
                            escape(data.input) +
                            '"</div>'
                        )
                    }
                }
            }
        })
    }

    disconnect () {
        this.choices.destroy()
    }
}
