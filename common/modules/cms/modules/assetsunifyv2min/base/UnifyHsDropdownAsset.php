<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\assets\unify\base;

/**
 *
 * // initialization of HSDropdown component
      $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {
        afterOpen: function(){
          $(this).find('input[type="search"]').focus();
        }
      });
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyHsDropdownAsset extends UnifyAsset
{
    public $css = [];

    public $js = [
        'assets/js/components/hs.dropdown.js',
    ];

    public $depends = [
        UnifyHsCoreAsset::class
    ];
}