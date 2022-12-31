

wp.domReady( () => {

  // Remove unwanted default block styles
  const stylesToRemove = [
    {
      "block": "core/button",
      "style": "outline"
    },
    {
      "block": "core/button",
      "style": "fill"
    },
    {
      "block": "core/image",
      "style": "rounded"
    },
  ]

  // Add our custom block styles
  const stylesToAdd = [
    {
      "block": "core/button",
      "styles": [
        {
          "name": "primary-button",
          "label": "Primary",
          "isDefault": true
        },
        {
          "name": "secondary-button",
          "label": "Secondary",
        }
      ]
    },
    {
      "block": "core/group",
      "styles": [
        {
          "name": "full-height",
          "label": "Full Height",
        },
        {
          "name": "bordered",
          "label": "Bordered",
        },
        {
          "name": "drop-bg",
          "label": "Drop BG",
        }
      ]
    },
    {
      "block": "core/image",
      "styles": [
        {
          "name": "shadow",
          "label": "Shadow",
        },
        {
          "name": "drop-bg",
          "label": "Drop BG",
        }
      ]
    },
    {
      "block": "core/list",
      "styles": [
        {
          "name": "basic",
          "label": "Basic",
        }
      ]
    }
  ]



  stylesToRemove.forEach(({block, style}) => {
    wp.blocks.unregisterBlockStyle(block, style)
  })


  stylesToAdd.forEach(({block, styles})=>{
    styles.forEach(style => {
      wp.blocks.registerBlockStyle(block, style)
    })
  })

  
})

