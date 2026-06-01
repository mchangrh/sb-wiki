// targets
group "default" {
  targets = ["sb-wiki-base", "sb-wiki"]
}

// variables
variable "OWNER_NAME" {
  type = string
  default = "mchangrh"
}

variable "MEDIAWIKI_MAJOR" {
  type = string
}

variable "MEDIAWIKI_VERSION" {
  type = string
}

variable "BRANCH" {
  type = string
}

// common arguments
target "_common" {
  platforms = ["linux/amd64", "linux/arm64"]
  attest = [{
      type = "provenance"
      mode = "max"
  }, {
    type = "sbom"
  }]
  args = {
    MEDIAWIKI_MAJOR = MEDIAWIKI_MAJOR
    MEDIAWIKI_VERSION = MEDIAWIKI_VERSION
    BRANCH = BRANCH
  }
}

target "sb-wiki-base" {
  inherits = ["_common"]
  context = "./mediawiki-base"
  tags = [
    "ghcr.io/${OWNER_NAME}/sb-wiki-base:${MEDIAWIKI_MAJOR}",
    "ghcr.io/${OWNER_NAME}/sb-wiki-base:${BRANCH}"
  ]
}

target "sb-wiki" {
  inherits = ["_common"]
  context = "./mediawiki"
  contexts = {
    "ghcr.io/${OWNER_NAME}/sb-wiki-base:${MEDIAWIKI_MAJOR}" = "target:sb-wiki-base"
  }
  tags = [
    "ghcr.io/${OWNER_NAME}/sb-wiki:${MEDIAWIKI_MAJOR}",
    "ghcr.io/${OWNER_NAME}/sb-wiki:${BRANCH}"
  ]
}
