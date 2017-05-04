
plugin.tx_kom_pi1 {
  view {
    # cat=plugin.tx_kom_pi1/file; type=string; label=Path to template root (FE)
    templateRootPath = EXT:kom/Resources/Private/Templates/
    # cat=plugin.tx_kom_pi1/file; type=string; label=Path to template partials (FE)
    partialRootPath = EXT:kom/Resources/Private/Partials/
    # cat=plugin.tx_kom_pi1/file; type=string; label=Path to template layouts (FE)
    layoutRootPath = EXT:kom/Resources/Private/Layouts/
  }
  persistence {
    # cat=plugin.tx_kom_pi1//a; type=string; label=Default storage PID
    storagePid =
  }
}

module.tx_kom_overview {
  view {
    # cat=module.tx_kom_overview/file; type=string; label=Path to template root (BE)
    templateRootPath = EXT:kom/Resources/Private/Backend/Templates/
    # cat=module.tx_kom_overview/file; type=string; label=Path to template partials (BE)
    partialRootPath = EXT:kom/Resources/Private/Backend/Partials/
    # cat=module.tx_kom_overview/file; type=string; label=Path to template layouts (BE)
    layoutRootPath = EXT:kom/Resources/Private/Backend/Layouts/
  }
  persistence {
    # cat=module.tx_kom_overview//a; type=string; label=Default storage PID
    storagePid =
  }
}
