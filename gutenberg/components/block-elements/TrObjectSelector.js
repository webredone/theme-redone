const {
  Card,
  CardHeader,
  CardFooter,
  CardBody,
  TextControl,
  Button,
  Spinner,
  TextHighlight,
  NavigableMenu,
  Dashicon
} = wp.components
const { __ } = wp.i18n
const { useState, useEffect } = wp.element
const apiFetch = wp.apiFetch
const { decodeEntities } = wp.htmlEntities

import trUpdateField from '../../core/trUpdateField'
import TrTooltip from '../TrTooltip'

const NAMESPACE = 'tr_guten_blocks'

// XXX: meta.object_type can be either "post" or "term"

const TrObjectSelector = ({ fieldData }) => {
  const { field_object, meta } = fieldData

  const [searchString, setSearchString] = useState('')
  const [searchResults, setSearchResults] = useState([])
  const [isLoading, setIsLoading] = useState(false)
  const [selectedItem, setSelectedItem] = useState(null)
  const [showResults, setShowResults] = useState(false)

  const [placeholder, setPlaceholder] = useState('')

  useEffect(() => {
    // Search for all posts on initial load
    setIsLoading(true)

    Promise.all(
      meta.objects.map(postType =>
        apiFetch({
          path: `/wp/v2/${postType}`
        })
      )
    ).then(results => {
      setSearchResults(
        results.reduce((result, final) => [...final, ...result], [])
      )

      setIsLoading(false)
    })
  }, [])

  useEffect(() => {
    if (field_object.id === null) {
      if (meta.hasOwnProperty('placeholder')) {
        setPlaceholder(meta.placeholder)
      }
    } else {
      setPlaceholder('')
    }

    console.log('selectedItem: ', field_object.id)
  }, [field_object])

  function handleItemSelection(post) {
    const newValue = { ...field_object }
    // expects ID and post_title
    newValue.id = post.id
    newValue.title =
      meta.object_type === 'post' ? post.title.rendered : post.name

    trUpdateField(fieldData, newValue)
    setSearchString('')
  }

  const handleResetSelectedPost = () => {
    const newValue = { ...field_object }
    // expects ID and post_title
    newValue.id = null
    newValue.title = ''

    trUpdateField(fieldData, newValue)
  }

  const handleToggleShowResults = () => {
    setShowResults(prevState => !prevState)
  }

  const handleSetShowResults = showOrHide => {
    setShowResults(showOrHide)
  }

  /**
   * Using the keyword and the list of tags that are linked to the parent block
   * search for posts that match and return them to the autocomplete component.
   *
   * @param {string} keyword search query string
   */
  const handleSearchStringChange = keyword => {
    setSearchString(keyword)
    setIsLoading(true)

    Promise.all(
      meta.objects.map(postType =>
        apiFetch({
          path: `/wp/v2/${postType}?search=${keyword}`
        })
      )
    ).then(results => {
      setSearchResults(
        results.reduce((result, final) => [...final, ...result], [])
      )
      setIsLoading(false)
    })
  }

  function handleSelection(item) {
    if (item === 0) {
      setSelectedItem(null)
    } else {
      setSelectedItem(item)
    }
  }

  return (
    <Card
      size="small"
      className={`tr-control tr-object-selector-control tr-control-name--${meta.field_name}`}
    >
      <CardHeader className="tr-object-selector-control__header">
        {__(meta.label)}

        <div className="tr-object-selector-control__header__actions">
          {meta.hasOwnProperty('help') && (
            <TrTooltip help tooltip={meta.help} />
          )}

          {showResults && (
            <button
              className="tr-remove"
              onClick={() => handleSetShowResults(false)}
            >
              <Dashicon icon="arrow-up-alt2" />
            </button>
          )}
        </div>
      </CardHeader>
      <CardBody>
        <NavigableMenu onNavigate={handleSelection} orientation={'vertical'}>
          <TextControl
            value={searchString}
            onChange={handleSearchStringChange}
            onClick={handleToggleShowResults}
            autocomplete="off"
            placeholder={placeholder}
          />
          {showResults ? (
            <ul
              className="grid"
              style={{
                marginTop: '0',
                marginBottom: '0',
                marginLeft: '0',
                paddingLeft: '0',
                listStyle: 'none'
              }}
            >
              {isLoading && <Spinner />}
              {!isLoading && !searchResults.length && (
                <li className="grid-item">
                  <Button disabled>{__('No Items found', NAMESPACE)}</Button>
                </li>
              )}
              {searchResults.map((result, index) => {
                if (meta.object_type === 'post') {
                  if (!result.title.rendered.length) {
                    return null
                  }
                } else {
                  if (!result.name.length) {
                    return null
                  }
                }

                if (meta.object_type === 'term') {
                  result.type = result.taxonomy
                }

                return (
                  <li
                    key={result.id}
                    className={`grid-item tr-object-selector-control-result ${
                      result.id === field_object.id ? 'active' : ''
                    }`}
                    style={{
                      marginBottom: '0'
                    }}
                  >
                    <SearchItem
                      meta={meta}
                      onClick={() => {
                        handleItemSelection(result)
                        handleSetShowResults(false)
                      }}
                      searchTerm={searchString}
                      suggestion={result}
                      isSelected={selectedItem === index + 1}
                    />
                  </li>
                )
              })}
            </ul>
          ) : null}
        </NavigableMenu>
      </CardBody>
      <CardFooter className="tr-object-selector-control__footer">
        <div className="tr-object-selector-control__footer__label">
          {meta.hasOwnProperty('selected_object_label')
            ? meta.selected_object_label
            : 'Selected Object:'}
        </div>
        <div className="tr-object-selector-control__footer__selected">
          {field_object.id ? (
            <div className="tr-object-selector-control__footer__selected__post">
              <span dangerouslySetInnerHTML={{ __html: field_object.title }} />
              <button className="tr-remove" onClick={handleResetSelectedPost}>
                <Dashicon icon="no-alt" />
              </button>
            </div>
          ) : (
            <span>None: Please select one</span>
          )}
        </div>
      </CardFooter>
    </Card>
  )
}

export default TrObjectSelector

function SearchItem(props) {
  const {
    meta,
    suggestion,
    onClick,
    searchTerm = '',
    isSelected = false,
    id = ''
  } = props

  return (
    <Button
      id={id}
      onClick={onClick}
      className={`block-editor-link-control__search-item is-entity ${isSelected &&
        'is-selected'}`}
      style={{
        borderRadius: '0'
      }}
    >
      <span className="block-editor-link-control__search-item-header">
        <span className="block-editor-link-control__search-item-title">
          <TextHighlight
            text={
              meta.object_type === 'post'
                ? decodeEntities(suggestion.title.rendered)
                : decodeEntities(suggestion.name)
            }
            highlight={searchTerm}
          />
        </span>
        {/*
          <span
          aria-hidden={true}
          className="block-editor-link-control__search-item-info"
        >
          {filterURLForDisplay(safeDecodeURI(suggestion.link)) || ""}
        </span>
        */}
      </span>
      {suggestion.type && (
        <span className="block-editor-link-control__search-item-type">
          {/* Rename 'post_tag' to 'tag'. Ideally, the API would return the localised CPT or taxonomy label. */}
          {suggestion.type === 'post_tag' ? 'tag' : suggestion.type}
        </span>
      )}
    </Button>
  )
}
