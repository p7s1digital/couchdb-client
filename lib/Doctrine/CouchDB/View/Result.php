<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license. For more information, see
 * <http://www.doctrine-project.org>.
 */

namespace Doctrine\CouchDB\View;

class Result implements \IteratorAggregate, \Countable, \ArrayAccess
{
    protected $result;

    public function __construct($result)
    {
        $this->result = $result;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->result['rows']);
    }

    public function count()
    {
        return count($this->result['rows']);
    }

    public function offsetExists($offset)
    {
        return isset($this->result['rows'][$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->result['rows'][$offset];
    }

    public function offsetSet($offset, $value)
    {
        throw new \BadMethodCallException("LuceneResult is immutable and cannot be changed.");
    }

    public function offsetUnset($offset)
    {
        throw new \BadMethodCallException("LuceneResult is immutable and cannot be changed.");
    }

    public function toArray()
    {
        return $this->result['rows'];
    }
}
