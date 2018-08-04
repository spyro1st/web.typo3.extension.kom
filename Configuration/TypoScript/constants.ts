
plugin.tx_kom {
  view {
    # cat=plugin.tx_kom/file; type=string; label=Path to template root (FE)
    templateRootPath = EXT:kom/Resources/Private/Templates/
    # cat=plugin.tx_kom/file; type=string; label=Path to template partials (FE)
    partialRootPath = EXT:kom/Resources/Private/Partials/
    # cat=plugin.tx_kom/file; type=string; label=Path to template layouts (FE)
    layoutRootPath = EXT:kom/Resources/Private/Layouts/
  }
  persistence {
    # cat=plugin.tx_kom//a; type=string; label=Default storage PID
    storagePid = 3
  }
  
  settings {
    # cat=plugin.tx_kom//a; type=string; label=Home Page PID
    homePid = 1
    # cat=plugin.tx_kom//a; type=string; label=Plugin Start Page PID
    questionnaireStartPid = 3
    # cat=plugin.tx_kom//a; type=string; label=Plugin Question Page PID
    questionnairePid = 4
    # cat=plugin.tx_kom//a; type=string; label=Plugin Emphasize Page PID
    emphasizePid = 5
    # cat=plugin.tx_kom//a; type=string; label=Plugin Result Page PID
    resultPid = 6
    # cat=plugin.tx_kom//a; type=string; label=Plugin Compare Page PID
    comparePid = 7
    # cat=plugin.tx_kom//a; type=string; label=Plugin Selection Page PID
    selectionPid = 8
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
    storagePid = 3
  }
}
