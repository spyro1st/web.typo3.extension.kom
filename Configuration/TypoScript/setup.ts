plugin.tx_kom {
  view {
    templateRootPaths.0 = EXT:kom/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_kom.view.templateRootPath}
    partialRootPaths.0 = EXT:kom/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_kom.view.partialRootPath}
    layoutRootPaths.0 = EXT:kom/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_kom.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_kom.persistence.storagePid}
    #recursive = 1
    classes {
      DigitalPatrioten\Kom\Domain\Model\ElectiondistrictElectionMapping {
        mapping {
          tableName = tx_kom_electiondistrict_election_mm
        }
      }
      DigitalPatrioten\Kom\Domain\Model\ResultOpinion {
        mapping {
          tableName = tx_kom_result_thesis_mm
        }
      }
      DigitalPatrioten\Kom\Domain\Model\CandidateElectionMapping {
        mapping {
          tableName = tx_kom_candidate_election_mm
        }
      }
      DigitalPatrioten\Kom\Domain\Model\CandidateOpinion {
        mapping {
          tableName = tx_kom_candidate_thesis_mm
        }
      }
    }
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
  
  settings {
    homePid = {$plugin.tx_kom.settings.homePid}
  }
}

plugin.tx_kom._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-kom table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-kom table th {
        font-weight:bold;
    }

    .tx-kom table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)

# Module configuration
module.tx_kom_web_komoverview {
  persistence {
    storagePid = {$module.tx_kom_overview.persistence.storagePid}
  }
  view {
    templateRootPaths.0 = EXT:kom/Resources/Private/Backend/Templates/
    templateRootPaths.1 = {$module.tx_kom_overview.view.templateRootPath}
    partialRootPaths.0 = EXT:kom/Resources/Private/Backend/Partials/
    partialRootPaths.1 = {$module.tx_kom_overview.view.partialRootPath}
    layoutRootPaths.0 = EXT:kom/Resources/Private/Backend/Layouts/
    layoutRootPaths.1 = {$module.tx_kom_overview.view.layoutRootPath}
  }
}
