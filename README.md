# Future Activities Content Manager API

Extends the Blackbird Advanced Content Manager Magento 2 extension to provide REST API support.

## Dependencies

This extension cannot work without: 

- [Blackbird Advanced Content Manager](https://www.advancedcontentmanager.com/documentation)

## How to use

This extension provides the following endpoints:

### Get specific content by ID

    GET rest/V1/acm/content/:id
    
You can also optionally pass in an attributes array containing the list
of field handles, e.g.:

    rest/V1/acm/content/1?attributes[]=url_key&attributes[]=my_unique_field
    
### Get content type

    GET rest/V1/acm/content-type/:identifier
    
You can also optionally pass in an attributes array containing the list
of field handles.

This will return the following object:

    {
        title: "",
        collection: []
    }
    
Where collection is an array of Content objects similar to:

    {
        title: "",
        custom_attributes: [
            {
                "attribute_code": "handle"
                "value": ""
            },
            {
                "attribute_code": "handle2"
                "value": ""
            }
        ]
    }
    
You can also pass in a filters array similar to the following to 
further filter the attribute type content collection:

    filters[0][attribute_code] = 'title';
    filters[0][value] = 'My Title'